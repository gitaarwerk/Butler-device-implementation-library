<?php
echo '<pre>';
// Load the bootrstrapper
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "Bootstrap" . DIRECTORY_SEPARATOR . "Bootstrap.php");

$url = \Framework\Defaults\Type\String::DEFAULT_VALUE;

// load url before the unset globals is done
if (isset($_GET["url"]))
{
    $url = \Framework\Core\CoreFunctions::cleanURI($_GET["url"]);

    // override accept headers, when extension is given, also strips the extension.
    $url = $headers->setHeaderContentTypeOverride($url);
}

\Framework\Core\CoreFunctions::removeMagicQuotes();
\Framework\Core\CoreFunctions::unregisterGlobals();