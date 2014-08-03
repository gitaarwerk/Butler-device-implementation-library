<?php

namespace Framework\Defaults\Type;

/**
 * Class Float
 * @package Framework\Defaults\Type
 */
class Float
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = 0.00;

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