<?php

namespace Framework\Defaults\Type;

/**
 * Class ArrayCollection
 * @package Framework\Defaults\Type
 */
class ArrayCollection
    implements \Framework\Interfaces\IsDefault
{
    const DEFAULT_VALUE = null;

    /**
     * @param $value
     * @return bool
     */
    public static function isDefault($value)
    {
        return ($value === self::DEFAULT_VALUE) ? true : false;
    }
}

?>