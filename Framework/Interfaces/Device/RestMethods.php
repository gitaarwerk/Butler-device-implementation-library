<?php

namespace Framework\Interfaces\Device;

/**
 * Interface RestMethods
 * @package Framework\Interfaces\Device
 */
interface RestMethods
{
    public function HTTPGet();
    public function HTTPPut();
    public function HTTPpost();
    public function HTTPPatch();
}