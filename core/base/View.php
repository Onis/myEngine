<?php

class View
{
    /**
     *
     */
    public function __construct() {}

    /**
     * @param string $name
     */
    public function render($name)
    {
        $name = explode('/', $name);
        require 'modules/' . $name[0] . '/views/' . $name[1]. '.php';
    }
}