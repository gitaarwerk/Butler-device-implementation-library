<?php

namespace Framework\Interfaces\Controller;

/**
 * Interface View
 * @package Framework\Interfaces\Controller
 */
interface View
{
    public function setView(\Framework\DeviceView\DeviceView $view);

    public function getView();
}