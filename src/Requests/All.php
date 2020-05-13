<?php

namespace Appoly\ShopWiredPHPSDK\Requests;

use Appoly\ShopWiredPHPSDK\ShopWiredClient;
use Appoly\ShopWiredPHPSDK\ShopWiredThrottle;

trait All
{
    /**
     * Return a list of all objects.
     *
     * @param array $options - Options
     * @return array
     */
    public static function all($options = [])
    {
        ShopWiredThrottle::throttle();

        $shopwired_client = ShopWiredClient::get();

        $response = $shopwired_client->get(static::$endpoint, [
            'query' => $options,
        ]);

        $response_body = $response->getBody()->getContents();

        return json_decode($response_body);
    }
}
