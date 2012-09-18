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
        require 'views/header.php';
        $path = 'modules/'.ModuleManager::$module.'/views/' . $name. '.tpl';
        Bootstrap::$smarty->display($path);
        require 'views/footer.php';
    }
}