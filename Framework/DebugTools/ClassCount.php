<?php

namespace Framework\DebugTools;

class ClassCount
    extends \Framework\Defaults\DefaultClass
{
    public static function Show()
    {
        return (int)count(get_declared_classes());
    }
}