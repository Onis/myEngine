<?php

class Bootstrap
{
    public static $db;

    /**
     *
     */
    function __construct()
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

    /**
     * Загружает все требуемые файлы
     */
    function requireAllFiles()
    {
        $this->_config = require 'config.php';
        $this->modules = $this->_config['Modules'];
        self::$db = $this->_config['DB'];

        require 'core/ModuleManager.php';

        require 'core/base/Controller.php';
        require 'core/base/Model.php';
        require 'core/base/View.php';
        require 'core/base/Module.php';

        require 'libs/Database.php';
        require 'libs/Hash.php';
        require 'libs/Session.php';
        require 'libs/Validation.php';
    }

    /**
     * Получает URL и сверяет его с массивом заданных URL, если есть совпадение
     * загружает тот или иной модуль, если совпадения нет загружает модуль error
     * @param $url URL с адресной строки
     * @return bool
     */
    function handlerURL($url)
    {
        ModuleManager::collectorURL($this->modules);
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
