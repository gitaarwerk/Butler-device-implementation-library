<?php

namespace Framework\Defaults\Types;

class FLOAT
{
 	const DEFAULT_VALUE = 0.00;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>