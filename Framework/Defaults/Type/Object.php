<?php

namespace Framework\Defaults\Type;

/**
 * Class Object
 * @package Framework\Defaults\Type
 */
class Object
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