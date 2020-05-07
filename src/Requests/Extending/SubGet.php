<?php

namespace Appoly\ShopWiredPHPSDK\Requests\Extending;


use Appoly\ShopWiredPHPSDK\Requests\Get;

trait SubGet
{
    use Get {
        get as protected _get;
    }

    public static function get($parent_id, $id) {
        $parent = new self::$extends;
        self::$endpoint = $parent::$endpoint . "/$parent_id/" . self::$endpoint;
        self::_get($id);
    }
}
