<?php

// Environment variables
    // Locale
    define("CHARSET", "UTF-8");

    // Filesystem
    define("FRAMEWORK_ROOT_DIRECTORY", dirname(dirname(__FILE__)));
    define("FRAMEWORK_DIRECTORY_SEPARATOR", DIRECTORY_SEPARATOR);

    // Log files
    define("FRAMEWORK_LOG_FILE_DIRECTORY", "Tmp" . FRAMEWORK_DIRECTORY_SEPARATOR . "Logs");
    define("FRAMEWORK_ERROR_LOG", FRAMEWORK_LOG_FILE_DIRECTORY . FRAMEWORK_DIRECTORY_SEPARATOR . "Error.log");

    // Networking
    define("FRAMEWORK_URL_PORT_SEPARATOR", ":");
    define("FRAMEWORK_URL_DOMAIN_SEPARATOR", ".");
    define("FRAMEWORK_URL_PARTIAL_SEPARATOR", "/");
    define("FRAMEWORK_URL_PROTOCOL_SEPARATOR", "://");

    // HTTP Interface
    define("FRAMEWORK_MVC_URL_PATTERN_SEPARATOR", "/");
    define("FRAMEWORK_MVC_URL_PATTERN_CONTROLLER", "controller");
    define("FRAMEWORK_MVC_URL_PATTERN_ACTION", "action");
    define("FRAMEWORK_MVC_URL_PATTERN",
        FRAMEWORK_MVC_URL_PATTERN_CONTROLLER .
        FRAMEWORK_MVC_URL_PATTERN_SEPARATOR .
        FRAMEWORK_MVC_URL_PATTERN_CONTROLLER .
        FRAMEWORK_MVC_URL_PATTERN_SEPARATOR .
        FRAMEWORK_MVC_URL_PATTERN_ACTION
    ); // reads as "controller/controller/action". The "action" is considered as an infinite mask


    // HTTP Responses
    define("FRAMEWORK_POSSIBLE_RESPONSE_TYPES", array("html", "json", "xml"));

// Framework namespacing
define("FRAMEWORK_CLASS_SEPARATOR", "\\");
define("FRAMEWORK_CLASS_ROOT_DIRECTORY", FRAMEWORK_CLASS_SEPARATOR . "Framework");
define("FRAMEWORK_CONTROLLER_DIRECTORY", "DeviceController");
define("FRAMEWORK_MODEL_DIRECTORY", "DeviceModel");
define("FRAMEWORK_VIEW_DIRECTORY", "DeviceView");

// Framework user agent variables
define("FRAMEWORK_USERAGENT_STRING", "Butler Device Factory"); // Sets the user agent of which it makes requests from