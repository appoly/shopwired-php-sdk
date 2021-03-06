<?php

namespace Appoly\ShopWiredPHPSDK\Models\Orders;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Count;
use Appoly\ShopWiredPHPSDK\Requests\Create;
use Appoly\ShopWiredPHPSDK\Requests\Delete;
use Appoly\ShopWiredPHPSDK\Requests\Get;
use Appoly\ShopWiredPHPSDK\Requests\Update;

class Orders
{
    use All, Count, Get, Create, Delete;

    public static $endpoint = '/v1/orders';
}
