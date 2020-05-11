<?php

namespace Appoly\ShopWiredPHPSDK\Requests;

use Appoly\ShopWiredPHPSDK\ShopWiredClient;

trait Get
{
    /**
     * Return an object by ID.
     *
     * @param int $id - Object ID
     * @param array $options - Options
     * @return array
     */
    public static function get($id, $options = [])
    {
        $shopwired_client = ShopWiredClient::get();

        $response = $shopwired_client->get(static::$endpoint.'/'.$id, [
            'query' => $options,
        ]);

        $response_body = $response->getBody()->getContents();

        return json_decode($response_body);
    }
}
