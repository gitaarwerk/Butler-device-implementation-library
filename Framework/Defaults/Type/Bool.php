<?php

namespace Framework\Defaults\Type;

/**
 * Class Bool
 * @package Framework\Defaults\Type
 */
class Bool
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = false;

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