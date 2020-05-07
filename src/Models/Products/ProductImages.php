<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\Extending\SubAll;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubCreate;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubDelete;
use Appoly\ShopWiredPHPSDK\Requests\Extending\SubUpdate;

class ProductImages
{
    use SubAll, SubCreate, SubUpdate, SubDelete;

    protected static $extends = Products::class;
    protected static $endpoint = 'images';
}
