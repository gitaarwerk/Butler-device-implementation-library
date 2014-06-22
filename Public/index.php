<?php

// Load the bootrstrapper
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "Bootstrap" . DIRECTORY_SEPARATOR . "Bootstrap.php");

// Call execution timer to loop trough whole event and starts it
$timer = new \Framework\DebugTools\ExecutionTimer();
$timer->startTimer();

$url = \Framework\Defaults\Type\String::DEFAULT_VALUE;

// load url before the unset globals is done
if (isset($_GET["url"]))
{
    $url = $_GET["url"];
}

\Framework\Core\CoreFunctions::removeMagicQuotes();
\Framework\Core\CoreFunctions::unregisterGlobals();

if (\Framework\Defaults\Type\String::isDefault($url) === false)
{
    // Build the controller
    $router = new \Framework\Core\Router($url);

    if (class_exists($router->getController()) === true)
    {
        $controller = $router->getController();
        $test = new $controller($router->getAction());
    }
    else
    {
        \Framework\Defaults\Exceptions\Exception::Notice("Invalid device type given.");
    }

}
else
{
    // TODO: Put something useful here, like expose all possible packages.
    echo "homepage...";
}

// set last execution timer and parse it
$timer->stopTimer();
$timer->parseExecutionTime();