<?php

namespace Appoly\ShopWiredPHPSDK\Requests;

use Appoly\ShopWiredPHPSDK\ShopWiredClient;
use Appoly\ShopWiredPHPSDK\ShopWiredThrottle;

trait Create
{
    /**
     * Creates a new object.
     *
     * @param array $data - Fields for the object
     * @return array
     */
    public static function create($data)
    {
        ShopWiredThrottle::throttle();

        $shopwired_client = ShopWiredClient::get();

        $response = $shopwired_client->post(static::$endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json'    => $data,
        ]);
        $response_body = $response->getBody()->getContents();

        return json_decode($response_body);
    }
}
