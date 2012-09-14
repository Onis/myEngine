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
    public function render($name, $noInclude = false)
    {
        $name = explode('/', $name);
        if ($noInclude == true) {
            require MODULES . $name[0] . '/views/' . $name[1]. '.php';
        } else {
            require 'views/header.php';
            require MODULES . $name[0] . '/views/' . $name[1]. '.php';
            require 'views/footer.php';
        }


    }
}