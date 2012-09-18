<?php

class Bootstrap
{
    public static $db;
    public static $smarty;

    /**
     *
     */
    function __construct()
    {
        $this->requireAllFiles();
        $this->loadSmarty();
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
        $this->_config = include 'config.php';
        $this->modules = $this->_config['Modules'];
        self::$db = $this->_config['DB'];

        include 'core/ModuleManager.php';

        include 'core/base/Controller.php';
        include 'core/base/Model.php';
        include 'core/base/View.php';
        include 'core/base/Module.php';

        include 'libs/Database.php';
        include 'libs/Hash.php';
        include 'libs/Session.php';
        include 'libs/Validation.php';
        include 'libs/Smarty/Smarty.class.php';
    }

    function loadSmarty()
    {
        $smarty = new Smarty();

        $smarty->caching = true;
        $smarty->cache_lifetime = 300;
        self::$smarty = $smarty;
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
