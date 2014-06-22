<?php

namespace Framework\DebugTools;

class ClassCount
{
    public static function Show()
    {
        return (int)count(get_declared_classes());
    }
}