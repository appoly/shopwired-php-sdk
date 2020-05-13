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

        $endpoint = self::$endpoint;
        self::$endpoint = $parent::$endpoint."/$parent_id/".self::$endpoint;
        $response = self::_all($options);
        self::$endpoint = $endpoint;

        return $response;
    }
}
