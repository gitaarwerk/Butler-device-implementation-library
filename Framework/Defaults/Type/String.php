<?php

namespace Framework\Defaults\Type;

/**
 * Class String
 * @package Framework\Defaults\Type
 */
class String
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = "";

    /**
     * @param $value
     * @return bool
     */
    public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}

    /**
     * @param $value
     * @return bool
     */
    public static function isEmpty($value)
    {
        if (isset($value) && trim($value) !== "")
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

?>