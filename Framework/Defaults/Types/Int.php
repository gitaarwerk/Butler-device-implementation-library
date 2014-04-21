<?php

namespace Framework\Defaults\Types;

class Int
{
 	const DEFAULT_VALUE = 0;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>