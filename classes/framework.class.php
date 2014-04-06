<?

class Framework_Exception_Error
{
	private static function _throwError($message, $severity, $throwsException, $returnJson)
	{
		if($throwsException === true)
		{
			throw new Exception($message);
		}
		else if ($returnJson === true)
		{
			return '{"error" : ' . (string) $message . '}';
		}
		else
		{
			return self::_errorFormatter($message, $severity);
		}
	}
	
	private static function _errorFormatter($message, $severity)
	{
		$msg = '<p style="border: 1px solid red; display: block; padding: 10px; ">' . (string) $message . '</p>';
		return $msg;
	}
	
	public static function Notice($message, $throwsException = true, $returnJson = false)
	{
		return self::$this->_throwError($message, -1, $throwsException, $returnJson);
	}
	
	public static function Error($message, $severity, $throwsException = true, $returnJson = false) 
	{
		return self::_throwError($message, $severity, $throwsException, $returnJson);
	}
}

class Framework_Default_Values
{
	
}

abstract class Framework_Default_Class
{
	public function __invoke()
	{
		Framework_Exception_Error::Error("You cannot use a class as a method...", 1, false);
	}
	
	public function __toString()
	{
		return Framework_Exception_Error::Error("You used a class as a value...", 0, false);
	}
	
	public function __get($name)
	{
		if(isset($name))
		{
			return $this->$name;
		}
		else
		{
			Framework_Exception_Error::Error("Value does not exist", 0);
		}
	}
	
	public function __set($name, $vars)
	{
		$this->$name = $vars;
	}	
}

?>