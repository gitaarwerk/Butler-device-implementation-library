<?php

namespace Framework\Interfaces\Controller;

interface HTTPMethods
{
    public function Delete();

    public function Get();

    public function Patch();

    public function Post();

    public function Put();
}