<?php

namespace Framework\Interfaces;

/**
 * Interface Iterator
 * @package Framework\Interfaces
 */
interface Iterator
{
    public function next();

    public function previous();

    public function first();

    public function last();
}

?>