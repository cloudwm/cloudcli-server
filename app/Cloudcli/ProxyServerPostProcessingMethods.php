<?php

namespace App\Cloudcli;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Throwable;

class ProxyServerPostProcessingMethods
{

    /*
     * Server-side post-processing methods for fields, referred to in cli_schema.json serverPostProcessing attribute
     */

    /**
     * @param $postMultipart array with arrays containing name and contents attributes
     * @param $p array processing configuration
     * @param $context
     * @return mixed modified postMultipart with disk image id
     * @throws ProxyServerInvalidArgumentException
     * @throws ProxyServerOptionsInvalidArgumentException
     */
    static function validateDiskImageId($postMultipart, $p, $context) {
        $values = ProxyServerPost::getPostMultiPartValues($postMultipart);
        $datacenter = Arr::get($values, 'datacenter');
        $disk_image = Arr::get($values, 'image');
        if ($datacenter and $disk_image) {
            $image_id_parts = explode(':', $disk_image);
            if (count($image_id_parts) == 2) {
                $image_datacenter = $image_id_parts[0];
                if ($image_datacenter != $datacenter) {
                    throw new ProxyServerInvalidArgumentException(
                        'disk image',
                        "disk image ID must match the selected datacenter (${datacenter})"
                    );
                }
            } else {
                ProxyServerPost::setMultipartValue(
                    $postMultipart,
                    'image',
                    ProxyServerOptions::getDiskImageId($disk_image, $datacenter, $context)
                );
            }
        } else {
            throw new ProxyServerInvalidArgumentException(
                'disk image',
                'datacenter and image arguments are required for server creation'
            );
        }
        return $postMultipart;
    }

    /**
     * @param $postMultipart array of key-value arrays with name, content pairs
     * @param $p array the post processing configuration
     * @param $context array contains metadata / objects for context
     * @return array key-value array with the POST data, must be last in processing chain
     * @throws ProxyServerInvalidArgumentException
     */
    static function createServerPostProcessing($postMultipart, $p, $context) {
        $values = ProxyServerPost::getPostMultiPartValues($postMultipart);
//        \Log::info($values);
        $diskSizeGB = [];
        foreach ($values["disk"] as $disk_id => $disk) {
            $diskSizeGB[$disk_id] = $disk["size"];
        }
        ksort($diskSizeGB);
        $useSimpleNetworking = false;
        $useSimpleWan = false;
        $useSimpleLan = false;
        $netIps = [];
        $netModes = [];
        $netNames = [];
        $netSubnets = [];
        $netPrefixes = [];
        foreach ($values["network"] as $network_id => $network) {
            $network_id = intval($network_id);
            $network_name = strtolower(trim(Arr::get($network, "name", "")));
            if (empty($network_name)) {throw new ProxyServerInvalidArgumentException("network name");}
            if ($network_name == "wan") {
                $netNames[$network_id] = "auto";
                $netModes[$network_id] = "wan";
            } else {
                $netNames[$network_id] = $network_name;
                $netModes[$network_id] = "lan";
            }
            $netIps[$network_id] = Arr::get($network, "ip", "auto");
            $netSubnets[$network_id] = "";
            $netPrefixes[$network_id] = 0;
        }
        ksort($netIps);
        ksort($netModes);
        ksort($netNames);
        ksort($netSubnets);
        ksort($netPrefixes);
        switch (strtolower(trim($values["billingcycle"]))) {
            case "monthly":
                $billingMode = 0;
                $trafficPackage = $values["monthlypackage"];
                break;
            case "hourly":
                $billingMode = 1;
                $trafficPackage = "t5000";
                break;
            default: throw new ProxyServerInvalidArgumentException("billingcycle");
        }
        switch (strtolower($values["managed"])) {
            case "yes": $managed = true; break;
            case "no": $managed = false; break;
            default: throw new ProxyServerInvalidArgumentException("managed");
        }
        switch (strtolower($values["dailybackup"])) {
            case "yes": $backup = true; break;
            case "no": $backup = false; break;
            default: throw new ProxyServerInvalidArgumentException("dailybackup");
        }
        switch (strtolower($values["poweronaftercreate"])) {
            case "yes": $poweroncompletion = true; break;
            case "no": $poweroncompletion = false; break;
            default: throw new ProxyServerInvalidArgumentException("poweronaftercreate");
        }
        $tags = [];
        if (Arr::get($values, 'tag')) {
            foreach ($values['tag'] as $tag) {
                if ($tag) {
                    $tags[] = ["value" => $tag, "label" => $tag];
                }
            }
        }
        $script = Arr::get($values, 'script-file', '');
        if (empty($script)) $script = '';
        $sshKey = Arr::get($values, 'ssh-key', '');
        if (empty($sshKey)) $sshKey = '';
        $userData = Arr::get($values, 'userdata-file', '');
        if (empty($userData)) $userData = '';
        return [
            "datacenter" => $values["datacenter"],
            "nServers" => 1,
            "names" => [$values["name"]],
            "cpuStr" => $values["cpu"],
            "cpuType" => $values["cpu"][strlen($values["cpu"])-1],
            "ramMB" => $values["ram"],
            "diskSizesGB" => $diskSizeGB,
            "password" => $values["password"],
            "passwordValidate" => $values["password"],
            "managed" => $managed,
            "backup" => $backup,
            "billingMode" => $billingMode,
            "trafficPackage" => $trafficPackage,
            "useSimpleNetworking" => $useSimpleNetworking,
            "powerOnCompletion" => $poweroncompletion,
            "useSimpleWan" => $useSimpleWan,
            "useSimpleLan" => $useSimpleLan,
            "netModes" => $netModes,
            "netNames" => $netNames,
            "netSubnets" => $netSubnets,
            "netPrefixes" => $netPrefixes,
            "netIps" => $netIps,
            "diskImageId" => Arr::get($values, "image", ''),
            "sourceServerId" => Arr::get($values, "sourceServerId", ''),
            "userId" => 0,
            "ownerId" => 0,
            "srcUI" => true,
            "selectedKey" => null,
            "script" => $script,
            "selectedSSHKeyValue" => $sshKey,
            "selectedTags" => $tags,
            "userData" => $userData,
        ];
    }

}


class ProxyServerInvalidArgumentException extends Exception {

    function __construct($argname, $message=null)
    {
        if (empty($message)) $message = "Invalid argument ($argname)";
        parent::__construct($message);
    }

}
