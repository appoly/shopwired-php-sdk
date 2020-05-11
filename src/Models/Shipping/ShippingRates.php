<?php

namespace Appoly\ShopWiredPHPSDK\Models\Shipping;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Count;
use Appoly\ShopWiredPHPSDK\Requests\Create;
use Appoly\ShopWiredPHPSDK\Requests\Delete;
use Appoly\ShopWiredPHPSDK\Requests\Get;
use Appoly\ShopWiredPHPSDK\Requests\Update;

class ShippingRates
{
    use All, Count, Get, Create, Update, Delete;

    public static $endpoint = '/v1/shipping-rates';
}
