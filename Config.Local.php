<?php

// sets local configurations

define("FRAMEWORK_DEVELOPMENT_ENVIRONMENT", true); // Run in debug mode if you are on development environment (true or false)

define('FRAMEWORK_SHOW_ERRORS', true); // Show framework errors (true or false)

// override all the accept header and always gives back overriden response value
define("FRAMEWORK_RESPONSE_OVERRIDE", "JSON"); // "", "JSON", "XML";

?>