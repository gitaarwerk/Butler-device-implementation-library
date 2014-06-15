<?php

namespace Framework\Defaults\Type;

class Float
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = 0.00;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>