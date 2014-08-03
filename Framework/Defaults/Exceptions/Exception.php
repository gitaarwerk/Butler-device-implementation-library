<?php

namespace Framework\Defaults\Exceptions;

/**
 * Class Exception
 * @package Framework\Defaults\Exceptions
 */
class Exception
{
	/**
	* Handles type of message.
	*
	* @param string $message Error message.
	* @param string $severity severity of the error message.
	* @param bool $throwsException Throws PHP execution.
	* @param bool $returnJson Gives error back in JSON formand.
	* @return Returns a given type of error.
	*/
	private static function _throwError($message, $severity, $throwsException, $returnJson)
	{
		if($throwsException === true)
		{
			// throw new Exception($message);
            echo $message;
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
	
	/**
	* Formats the error message text.
	*
	* @param string $message Error message.
	* @param string $severity severity of the error message.
	* @return string Returns error message.
	*/
	private static function _errorFormatter($message, $severity)
	{
		$msg = '<p style="border: 1px solid red; display: block; padding: 10px; ">' . (string) $message . '</p>';
		
		return $msg;
	}
	
	/**
	* Formats the error message text.
	*
	* @param string $message Error message.
	* @param bool $throwsException Throws PHP execution.
	* @param vool $returnJson Gives error back in JSON formand.
	* @return function $this->_throwError Returns _throwError function.
	*/
	public static function Notice($message, $throwsException = true, $returnJson = true)
	{
		return self::_throwError($message, -1, $throwsException, $returnJson);
	}
	
	/**
	* Formats the error message text.
	*
	* @param string $message Error message.
	* @param string $severity severity of the error message.
	* @param bool $throwsException Throws PHP execution.
	* @param vool $returnJson Gives error back in JSON formand.
	* @return function $this->_throwError Returns _throwError function.
	*/
	public static function Error($message, $severity = 0, $throwsException = true, $returnJson = false)
	{
		return self::_throwError($message, $severity, $throwsException, $returnJson);
	}
}
?>