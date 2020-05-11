<?php

namespace Appoly\ShopWiredPHPSDK\Requests\Extending;

use Appoly\ShopWiredPHPSDK\Requests\All;

trait SubAll
{
    use All {
        all as protected _all;
    }

    public static function all($parent_id, $options = [])
    {
        $parent = new self::$extends;
        self::$endpoint = $parent::$endpoint."/$parent_id/".self::$endpoint;
        return self::_all($options);
    }
}
