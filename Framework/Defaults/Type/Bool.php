<?php

namespace Framework\Defaults\Type;

class Bool
    implements \Framework\Interfaces\IsDefault
{
 	const DEFAULT_VALUE = false;
	
	public static function isDefault($value)
	{
		return ($value === self::DEFAULT_VALUE) ? true : false;
	}
}

?>