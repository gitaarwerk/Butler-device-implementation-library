<?php

namespace Framework\Defaults;

abstract class DefaultClass
{
	public static function __invoke()
	{
		\Framework\Defaults\Exceptions\Exception::Error("You cannot use a class as a method...", 1, false);
	}
	
	public function __toString()
	{
		return \Framework\Defaults\Exceptions\Exception::Error("You used a class as a value...", 0, false);
	}
	
	public function __get($name)
	{
		return \Framework\Defaults\Exceptions\Exception::Error("The variable: " . $name . " is not set...", 0, false);
	}
	
	public function __set($name, $vars)
	{
		return \Framework\Defaults\Exceptions\Exception::Error("You may not set the variable" . $name . "...", 0, false);
	}	
}

?>