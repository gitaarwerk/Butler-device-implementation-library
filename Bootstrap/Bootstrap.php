<?php
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


// Init all settings.
require_once("SetSettings.php");

// Load the autoloader.
require_once("Autoloader.php");

$classLoader = new SplClassLoader("Framework", FRAMEWORK_ROOT_DIRECTORY); // load Framework
$classLoader->register();

// Start error reporting.
if (FRAMEWORK_DEVELOPMENT_ENVIRONMENT === true)
{
    \Framework\DebugTools\ErrorReporting::startErrorReporting();
}

\Framework\Core\Kernel::Start();