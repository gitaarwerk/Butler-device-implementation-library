<?php

// Environment variables
    // Filesystem
    define("FRAMEWORK_ROOT_DIRECTORY", dirname(dirname(__FILE__)));
    define("FRAMEWORK_DIRECTORY_SEPARATOR", DIRECTORY_SEPARATOR);

    // Log files
    define("FRAMEWORK_LOG_FILE_DIRECTORY", "Tmp" . FRAMEWORK_DIRECTORY_SEPARATOR . "Logs");
    define("FRAMEWORK_ERROR_LOG", FRAMEWORK_LOG_FILE_DIRECTORY . FRAMEWORK_DIRECTORY_SEPARATOR . "Error.log");

    // Networking
    define("FRAMEWORK_URL_PORT_SEPARATOR", ":");
    define("FRAMEWORK_URL_DOMAIN_SEPARATOR", ".");
    define("FRAMEWORK_URL_FOLDER_SEPARATOR", "/");
    define("FRAMEWORK_URL_PROTOCOL_SEPARATOR", "://");

// Framework namespacing
define("FRAMEWORK_CLASS_SEPARATOR", "\\");
define("FRAMEWORK_CLASS_ROOT_NAME", FRAMEWORK_CLASS_SEPARATOR . "Framework");
define("FRAMEWORK_CONTROLLER_NAME", "DeviceController");
define("FRAMEWORK_MODEL_NAME", "DeviceModel");
define("FRAMEWORK_VIEW_NAME", "DeviceView");

// Framework agent variables
define("FRAMEWORK_USERAGENT_STRING", "Butler Device Factory"); // Sets the user agent of which it makes requests from

?>
