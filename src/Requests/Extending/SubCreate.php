<?php

namespace Appoly\ShopWiredPHPSDK\Requests\Extending;

use Appoly\ShopWiredPHPSDK\Requests\Create;

trait SubCreate
{
    use Create {
        create as protected _create;
    }

    public static function create($parent_id, $data)
    {
        $parent = new self::$extends;

        $endpoint = self::$endpoint;
        self::$endpoint = $parent::$endpoint."/$parent_id/".self::$endpoint;
        $response = self::_create($data);
        self::$endpoint = $endpoint;

        return $response;
    }
}
