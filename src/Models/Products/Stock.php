<?php

namespace Appoly\ShopWiredPHPSDK\Models\Products;

use Appoly\ShopWiredPHPSDK\Requests\Get;
use Appoly\ShopWiredPHPSDK\Requests\Create;

class Stock
{
    use Get {
        get as protected _get;
    }

    use Create {
        create as protected _create;
    }

    public static $endpoint = '/v1/stock';

    public static function get($sku) {
        return self::_get(null, [
            'sku' => $sku,
        ]);
    }

    public static function update($sku, $quantity) {
        return self::_create([
            'sku' => $sku,
            'quantity' => $quantity,
        ]);
    }
}
