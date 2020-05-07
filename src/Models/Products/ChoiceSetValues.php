<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\Create;
use Appoly\ShopWiredPHPSDK\Requests\Delete;
use Appoly\ShopWiredPHPSDK\Requests\Update;

class ChoiceSetValues
{
    use Create, Update, Delete;

    public static $endpoint = '/v1/choice-set-values';
}
