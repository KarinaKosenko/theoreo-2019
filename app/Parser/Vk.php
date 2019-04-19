<?php

namespace App\Parser;


use GuzzleHttp\Client;

class Vk
{
    const API_URL = 'https://api.vk.com/method/';

    const API_VERSION = '5.92';

    protected static $accessToken = null;

    /**
     * Set access token
     *
     * @param $accessToken
     */
    public static function setAccessToken($accessToken)
    {
        self::$accessToken = $accessToken;
    }


    public static function api($method, $debug = false)
    {
        if (is_null(self::$accessToken)) {
            throw new \Exception('Specify access token!');
        }

        $camelCaseToUnderscore = function($value) {
            return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $value));
        };

        $parameters = [];
        foreach ($method->getProperties() as $property => $value) {

            if (is_null($value)) continue;

            if (!in_array($camelCaseToUnderscore($property), ['photos_list'])){
                $parameters[] = $camelCaseToUnderscore($property) . '=' . urlencode($value);
            }else{
                $parameters[] = $camelCaseToUnderscore($property) . '=' . $value;
            }
        }

        $parameters[] = 'access_token=' . self::$accessToken;
        $parameters[] = 'v=' . self::API_VERSION;

        $parameters = implode('&', $parameters);

        if ($debug) {
            print_r($parameters);
            exit();
        }

        $url = self::API_URL . $method::METHOD . '?' . $parameters;
        $client = new Client();
        $response = $client->get($url);

        return json_decode($response->getBody(), true);
    }


}