<?php

// Environment variables
    // Locale
    define("CHARSET", "Utf-8");

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

    // HTTP Interface
    define("FRAMEWORK_MVC_URL_PATTERN", 'controller/controller/action/');


// Framework namespacing
define("FRAMEWORK_CLASS_SEPARATOR", "\\");
define("FRAMEWORK_CLASS_ROOT_DIRECTORY", FRAMEWORK_CLASS_SEPARATOR . "Framework");
define("FRAMEWORK_CONTROLLER_DIRECTORY", "DeviceController");
define("FRAMEWORK_MODEL_DIRECTORY", "DeviceModel");
define("FRAMEWORK_VIEW_DIRECTORY", "DeviceView");

// Framework agent variables
define("FRAMEWORK_USERAGENT_STRING", "Butler Device Factory"); // Sets the user agent of which it makes requests from

?>
