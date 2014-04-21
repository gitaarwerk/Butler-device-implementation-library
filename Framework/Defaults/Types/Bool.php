<?php

namespace Framework\Defaults\Types;

class BOOL
{
 	const DEFAULT_VALUE = false;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>