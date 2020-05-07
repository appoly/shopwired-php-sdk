<?php

namespace Appoly\ShopWiredPHPSDK\Requests\Extending;

use Appoly\ShopWiredPHPSDK\Requests\Update;

trait SubUpdate
{
    use Update {
        update as protected _update;
    }

    public static function update($parent_id, $id, $data)
    {
        $parent = new self::$extends;
        self::$endpoint = $parent::$endpoint."/$parent_id/".self::$endpoint;
        self::_update($id, $data);
    }
}
