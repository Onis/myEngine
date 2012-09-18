<?php

class View
{

    /**
     *
     */
    public function __construct() {}

    /**
     * Осуществляет загрузку вьюхи
     * @param string $name
     */
    public function render($name)
    {
        $name = explode('/', $name);
        require 'views/header.php';
        require MODULES . $name[0] . '/views/' . $name[1]. '.php';
        require 'views/footer.php';
    }
}