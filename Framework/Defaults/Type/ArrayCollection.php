<?php

namespace Framework\Defaults\Type;

class ArrayCollection
    implements \Framework\Interfaces\IsDefault
{
    const DEFAULT_VALUE = null;

    public static function isDefault($value)
    {
        return ($value === self::DEFAULT_VALUE) ? true : false;
    }
}

?>