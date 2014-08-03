<?php

namespace Framework\DebugTools;

/**
 * Class ClassCount
 * @package Framework\DebugTools
 */
class ClassCount
    extends \Framework\Defaults\DefaultClass
{
    /**
     * @return int
     */
    public static function Show()
    {
        return (int)count(get_declared_classes());
    }
}