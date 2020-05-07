<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\Extending\SubCreate;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubDelete;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubUpdate;

class ProductOptionValues
{
    use SubCreate, SubUpdate, SubDelete;

    protected static $extends = Products::class;
    protected static $endpoint = 'option-values';
}
