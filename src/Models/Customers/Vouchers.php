<?php

namespace Appoly\ShopWiredPHPSDK\Models\Customers;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Count;
use Appoly\ShopWiredPHPSDK\Requests\Create;
use Appoly\ShopWiredPHPSDK\Requests\Delete;
use Appoly\ShopWiredPHPSDK\Requests\Get;
use Appoly\ShopWiredPHPSDK\Requests\Update;

class Vouchers
{
    use All, Count, Get, Create, Update, Delete;

    public static $endpoint = '/v1/vouchers';
}
