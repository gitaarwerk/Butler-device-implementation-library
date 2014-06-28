<?php

session_start();

// Load framework.
require_once("FrameworkSettings.php");

// Load local settings.
$localConfigurationFile = FRAMEWORK_ROOT_DIRECTORY . FRAMEWORK_DIRECTORY_SEPARATOR . "Config.Local.php";

if (file_exists($localConfigurationFile) === true)
{
    require_once($localConfigurationFile);
}
else
{
    echo 'No local settings available. Please fix them first...';
}

// Load the autoloader.
require_once("Autoloader.php");

$classLoader = new SplClassLoader("Framework", FRAMEWORK_ROOT_DIRECTORY); // load Framework
$classLoader->register();


\Framework\Core\Kernel::Start();