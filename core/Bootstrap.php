<?php

class Bootstrap
{
    public $_config;

    public function __construct()
    {
        $this->requireAllFiles();
        if(empty($_GET['url']) || $_GET['url'] == 'index') {
            ModuleManager::loadModule('index');

        } else {
            if($this->handlerURL($_GET['url'])) {
                ModuleManager::loadModule('error');
            }

        }


    }

    public function requireAllFiles()
    {
        $this->_config = require 'config.php';

        require 'core/ModuleManager.php';

        require 'core/base/Controller.php';
        require 'core/base/Model.php';
        require 'core/base/View.php';
        require 'core/base/Module.php';

        require 'libs/Database.php';
        require 'libs/Hash.php';
        require 'libs/Session.php';
        require 'libs/Validation.php';
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
                    return false;
                }
            }
        }
        ModuleManager::loadModule('error');
    }

}
