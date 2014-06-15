<?php

namespace Framework\Defaults\Type;

class Object
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = NULL;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>