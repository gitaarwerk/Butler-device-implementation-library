<?php

namespace Framework\Data;

class URLLoader
    extends \Framework\Defaults\DefaultClass
{
    private static $_curl;
    private static $_headers;

    private static function initialize($headers)
    {
        $return_headers = array();

        if($headers !== '')
        {
            switch(strtolower($headers))
            {
                case 'xml' :
                    array_push($return_headers,
                        'Accept: application/xml',
                        'Content-Type: application/xml'
                    );
                break;
                case 'json' :
                    array_push($return_headers,
                        'Accept: application/json',
                        'Content-Type: application/json'
                    );
                break;
            }
        }

        self::$_headers = $return_headers;

        self::$_curl = curl_init();
    }

    private static function unload()
    {
        // Close request to clear up some resources
        curl_close(self::$_curl);
    }

    public static function put($url, $data = '', $headers = '')
    {
        self::initialize($headers);

        return $response;
    }

    public static function get($url, $data = '', $headers = '')
    {
        self::initialize($headers);

        curl_setopt_array(self::$_curl, array(
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => self::$_headers,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_FORBID_REUSE => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => FRAMEWORK_USERAGENT_STRING,
            CURLOPT_URL => $url
        ));

        $resp = curl_exec(self::$_curl);

        return $resp;
    }
}

?>

