<?php
// Load framework
require_once("FrameworkSettings.php");
require_once("Autoloader.php");
require_once(FRAMEWORK_ROOT_DIRECTORY . FRAMEWORK_DIRECTORY_SEPARATOR . "Config.Local.php");

// Load the autoloader class
$classLoader = new SplClassLoader("Framework", FRAMEWORK_ROOT_DIRECTORY); // load Framework
$classLoader->register();

if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
{
    \Framework\DebugTools\ErrorReporting::startErrorReporting();
}

?>