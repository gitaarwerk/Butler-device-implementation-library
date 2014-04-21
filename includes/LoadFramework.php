<?php

// Set basic constants
define('FRAMEWORK_DIRECTORY', dirname(__FILE__));
define('FRAMEWORK_LIBRARY_DIRECTORY', FRAMEWORK_DIRECTORY . 'Lib'); // library directory name without slashes;

// Load settings
require_once( FRAMEWORK_DIRECTORY . DIRECTORY_SEPARATOR . 'Settings.php');

if(FRAMEWORK_SHOW_ERRORS === true)
{
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
}

// Load framework

require_once('FrameworkSettings.php');

require_once( FRAMEWORK_DIRECTORY . DIRECTORY_SEPARATOR . 'Autoloader.php');

// echo FRAMEWORK_DIRECTORY;

$classLoader = new SplClassLoader('Framework', '/var/www/services/jester'); // load Framework
$classLoader->register();

?>