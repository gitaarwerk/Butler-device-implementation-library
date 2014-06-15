<?php
// set error reporting to true when in Debug mode
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// set error reporting to true when in Debug mode
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "Bootstrap" . DIRECTORY_SEPARATOR . "Bootstrap.php");

// Call execution timer to loop trough whole event & start it
$timer = new \Framework\DebugTools\ExecutionTimer();
$timer->startTimer();

$url = \Framework\Defaults\Type\String::DEFAULT_VALUE;

// load url before the unset globals is done
if(isset($_GET["url"]))
{
    $url = $_GET["url"];
}

\Framework\Core\CoreFunctions::removeMagicQuotes();
\Framework\Core\CoreFunctions::unregisterGlobals();

if (\Framework\Defaults\Type\String::isDefault($url) === false)
{
    // assign controller by url
    \Framework\Core\CoreFunctions::controllerFactory($url);
}
else
{
    // assign homepage controller
    echo "homepage...";
}


// set last execution timer and parse it
$timer->stopTimer();
$timer->parseExecutionTime();