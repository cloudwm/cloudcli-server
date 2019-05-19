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

class ProxyServerFieldProcessingMethods
{

    /**
     * Server-side processing methods for fields, referred to in cli_schema.json serverProcessing attribute
     */

    static function _renameField($multiPartField, $p) {
        $multiPartField["name"] = $p["to"];
        return $multiPartField;
    }

    static function validateChars($multiPartField, $p) {
        $name = $multiPartField["name"];
        $value = $multiPartField["contents"];
        $valueArr = str_split($value);
        if (Arr::has($p, "minLength") && count($valueArr) < $p["minLength"]) {
            throw new ProxyServerValidateCharsException($name, "less then ".$p["minLength"]." characters");
        }
        if (Arr::has($p, "maxLength") && count($valueArr) > $p["maxLength"]) {
            throw new ProxyServerValidateCharsException($name, "more then ".$p["maxLength"]." characters");
        }
        $allowedChars = "";
        if (Arr::has($p, "atLeastOneOf")) {
            foreach ($p["atLeastOneOf"] as $chars) {
                $allowedChars .= $chars;
                $charsArr = str_split($chars);
                $gotOne = false;
                foreach ($valueArr as $valueChar) {
                    if (in_array($valueChar, $charsArr)) {
                        $gotOne = true;
                    }
                }
                if (! $gotOne) {
                    throw new ProxyServerValidateCharsException($name, "must have at least one of: '".$chars."'");
                }
            }
        }
        if (Arr::has($p, "extraAllowedChars")) {
            $allowedChars .= $p["extraAllowedChars"];
        }
        $allowedcharsArr = str_split($allowedChars);
        foreach ($valueArr as $valueChar) {
            if (! in_array($valueChar, $allowedcharsArr)) {
                throw new ProxyServerValidateCharsException($name, "disallowed character: '".$valueChar."', allowed characters: '".$allowedChars."'");
            }
        }
        return $multiPartField;
    }

}


class ProxyServerValidateCharsException extends Exception {

    function __construct($fieldName, $message=null) {
        if (empty($message)) $message = "Invalid value";
        parent::__construct($message." for field ".$fieldName);
    }

};
