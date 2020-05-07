<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\Extending\SubAll;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubCreate;

class Refunds
{
    use SubAll, SubCreate;

    protected static $extends = Orders::class;
    protected static $endpoint = 'refunds';
}
