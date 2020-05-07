<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Create;
use Appoly\ShopWiredPHPSDK\Requests\Delete;
use Appoly\ShopWiredPHPSDK\Requests\Get;
use Appoly\ShopWiredPHPSDK\Requests\Update;

class TradeGroups
{
    use All, Get, Create, Update, Delete;

    public static $endpoint = '/v1/trade-groups';
}
