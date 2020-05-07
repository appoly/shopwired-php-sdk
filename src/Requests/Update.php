<?php


namespace Appoly\ShopWiredPHPSDK\Requests;

use Appoly\ShopWiredPHPSDK\ShopWiredClient;

trait Update
{
    /**
     * Updates an object
     *
     * @param integer $id - ID for the object
     * @param array $data - Fields for the object
     * @return array
     */
    public static function update($id, $data)
    {
        $shopwired_client = ShopWiredClient::get();

        $response      = $shopwired_client->put(static::$endpoint . '/' . $id, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json'    => $data,
        ]);
        $response_body = $response->getBody()->getContents();

        return json_decode($response_body);
    }
}
