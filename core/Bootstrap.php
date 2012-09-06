<?php

class Bootstrap
{
    public $_config;

    public function __construct()
    {
        $this->requireAllFiles();
        $moduleManager = new ModuleManager();
        if(isset($_GET['url'])) {
            $this->handlerURL($_GET['url']);
        } else {
            echo 'Module is not found';
        }


    }

    public function requireAllFiles()
    {
        $this->_config = require 'config.php';

        require CORE . 'ModuleManager.php';

        require BASE . 'Controller.php';
        require BASE . 'Model.php';
        require BASE . 'View.php';

        require LIBS . 'Database.php';
        require LIBS . 'Hash.php';
        require LIBS . 'Session.php';

        //require '';
    }


    public function handlerURL($url)
    {
        ModuleManager::collectorURL($this->_config);
        $models = ModuleManager::$_modules;
        foreach ($models as $key1 => $value1 ) {
            foreach ($value1 as $value2) {
                if(preg_match($value2, $url) ) {
                    ModuleManager::loadModule($key1);
                }
            }
        }
    }

}
