<?php

namespace Appoly\ShopWiredPHPSDK\Requests\Extending;

use Appoly\ShopWiredPHPSDK\Requests\Delete;

trait SubDelete
{
    use Delete {
        delete as protected _delete;
    }

    public static function delete($parent_id, $id)
    {
        $parent = new self::$extends;
        self::$endpoint = $parent::$endpoint."/$parent_id/".self::$endpoint;
        self::_delete($id);
    }
}
