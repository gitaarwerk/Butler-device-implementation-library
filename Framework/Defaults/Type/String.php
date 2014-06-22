<?php

namespace Framework\Defaults\Type;

class String
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = "";
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}

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