<?php

namespace Framework\Defaults\Type;

/**
 * Class Int
 * @package Framework\Defaults\Type
 */
class Int
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = 0;

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