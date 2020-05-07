<?php

namespace Appoly\ShopWiredPHPSDK;

use GuzzleHttp\Client;

class ShopWiredClient
{
    private static $api_key;
    private static $secret;
    private static $client;

    public static function get()
    {
        if (self::$client) {
            return self::$client;
        }

        self::setCredentialsFromEnv();

        self::$client = new Client([
            'base_uri' => 'https://api.ecommerceapi.uk',
            'auth' => [
                self::$api_key,
                self::$secret,
            ],
        ]);

        return self::$client;
    }

    public static function setCredentials($api_key, $secret)
    {
        self::$api_key = $api_key;
        self::$secret = $secret;
    }

    private static function setCredentialsFromEnv()
    {
        if (env('SHOPWIRED_API_KEY')) {
            self::$api_key = env('SHOPWIRED_API_KEY');
        }
        if (env('SHOPWIRED_API_KEY')) {
            self::$secret = env('SHOPWIRED_SECRET');
        }
    }
}
