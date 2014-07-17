<?php

require_once("header.php");

if (\Framework\Defaults\Type\String::isDefault($url) === false)
{
    // Build the controller
    $router = new \Framework\Core\Router($url);

    if (class_exists($router->getController()) === true)
    {
        $controller = $router->getController();

        if ($router->getController() === "\\Framework\\DeviceController\\Mediaserver\\Plex")
        {
            $dataLoader = new \Framework\Build\Dataloader(
                FRAMEWORK_ROOT_DIRECTORY .
                FRAMEWORK_DIRECTORY_SEPARATOR .
                "DeviceTemplates" .
                FRAMEWORK_DIRECTORY_SEPARATOR .
                "plex.json",
                "JSON"
            );

            $data = $dataLoader->getData();
            $configuration = new \Framework\Build\DeviceConfiguration($data);

        }
        $page = new $controller($configuration, $router->getAction());
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

require_once("footer.php");