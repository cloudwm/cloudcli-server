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

class ProxyServerOptions
{

    static function getDiskImageId($disk_image, $datacenter, $context)
    {
//        \Log::info("Fetching server options to get disk image ID (disk image name = ${disk_image})");
        $serverOptions = ProxyServerGet::get($context['request'], [
            "path" => "/service/server",
            "schemaCommand" => []
        ]);
        if (Arr::get($serverOptions, 'error')) {
            \Log::error($serverOptions);
            throw new ProxyServerOptionsInvalidArgumentException(
                'disk image',
                'failed to get server options'
            );
        } else {
            $disk_image_id = null;
            $disk_image_names = [];
            foreach (Arr::get($serverOptions, "diskImages.${datacenter}", []) as $_diskImage) {
                $_diskImageDescription = Arr::get($_diskImage, 'description');
                $_diskImageId = Arr::get($_diskImage, 'id');
                if ($_diskImageId && $_diskImageDescription) {
                    // \Log::info("${_diskImageId}: ${_diskImageDescription}");
                    $disk_image_names[] = $_diskImageDescription;
                    if (trim($_diskImageDescription) === trim($disk_image)) {
                        $disk_image_id = $_diskImageId;
                        break;
                    }
                } else {
                    \Log::warn("Invalid disk image from server options: ${_diskImage}");
                }
            }
            if (! $disk_image_id) {
                throw new ProxyServerOptionsInvalidArgumentException(
                    'disk image',
                    "failed to find disk image ID from name '${disk_image}', available names for datacenter ${datacenter}: ".implode(', ', $disk_image_names)
                );
            }
            return $disk_image_id;
        }
    }

}


class ProxyServerOptionsInvalidArgumentException extends Exception {

    function __construct($argname, $message=null)
    {
        if (empty($message)) $message = "Invalid argument ($argname)";
        parent::__construct($message);
    }

}
