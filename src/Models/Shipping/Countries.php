<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Get;

class Countries
{
    use All, Get;

    public static $endpoint = '/v1/countries';
}
