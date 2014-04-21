<?php

namespace Framework\Defaults\Types;

class STRING
{
 	const DEFAULT_VALUE = NULL;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>