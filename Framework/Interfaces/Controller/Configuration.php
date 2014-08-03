<?php

namespace Framework\Interfaces\Controller;

/**
 * Interface Configuration
 * @package Framework\Interfaces\Controller
 */
interface Configuration
{
    public function setConfiguration($configurationArray);

    public function getConfiguration();
}