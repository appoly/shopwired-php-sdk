<?php

namespace Appoly\ShopWiredPHPSDK\Requests;

use Appoly\ShopWiredPHPSDK\ShopWiredClient;
use Appoly\ShopWiredPHPSDK\ShopWiredThrottle;

trait Delete
{
    /**
     * Deletes an object.
     *
     * @param int $id - ID for the object
     */
    public static function delete($id)
    {
        ShopWiredThrottle::throttle();

        $shopwired_client = ShopWiredClient::get();

        $shopwired_client->delete(static::$endpoint.'/'.$id);
    }
}
