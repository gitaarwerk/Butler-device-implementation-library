<?php
// Load the bootrstrapper
require_once(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "Bootstrap" . DIRECTORY_SEPARATOR . "Bootstrap.php");

\Framework\Core\CoreFunctions::removeMagicQuotes();
\Framework\Core\CoreFunctions::unregisterGlobals();