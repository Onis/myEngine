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
            require 'modules/' . $name. 'views/'. $name . '.php';
    }
}