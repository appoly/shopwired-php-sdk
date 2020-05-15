<?php

namespace Appoly\ShopWiredPHPSDK\Models\Orders;

use Appoly\ShopWiredPHPSDK\Requests\All;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubAll;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubCreate;

class OrderStatus
{
    use SubCreate {
        create as update;
    }

    protected static $extends = Orders::class;
    protected static $endpoint = 'status';
}
