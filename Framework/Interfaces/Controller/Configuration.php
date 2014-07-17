<?php

namespace Framework\Interfaces\Controller;

interface Configuration
{
    public function setConfiguration($configurationArray);

    public function getConfiguration();
}