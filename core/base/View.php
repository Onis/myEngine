<?php

class View
{
    public $smarty;
    /**
     *
     */
    public function __construct() {
        $this->loadSmarty();
    }

    /**
     * Осуществляет загрузку вьюхи
     * @param string $name
     */
    public function render($name)
    {
        $path = 'modules/'.ModuleManager::$module.'/views/' . $name. '.tpl';
        require 'views/header.tpl';
        $this->smarty->display($path);
        require 'views/footer.tpl';
    }

    public function loadSmarty()
    {
        $this->smarty = new Smarty();
    }
}