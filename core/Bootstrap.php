<?php

class Bootstrap
{
    protected $_config;

    public function __construct()
    {
        $this->requireAllFiles();
        $moduleManager = new ModuleManager();
        ModuleManager::handlerURL($this->_config);
        var_dump(ModuleManager::$_modules);

    }

    public function requireAllFiles()
    {
        $this->_config = require 'config.php';

        require CORE . 'ModuleManager.php';

        require BASE . 'Controller.php';
        require BASE . 'Model.php';
        require BASE . 'View.php';

        require CORE . 'Database.php';

        //require '';
    }

}
