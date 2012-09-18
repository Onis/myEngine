<?php

class ModuleManager
{

    public function __construct()
    {

    }

    public static $_modules = array();
    public static $module;

    /**
     * Подключение модуля
     * @param string $module_name имя подключаемого модуля
     */
    public static function loadModule ($module_name)
    {
        $module_path = MODULES . $module_name . '/' . $module_name . 'Module.php';
        if (file_exists($module_path))
        {
            include_once($module_path);
            self::$module = $module_name;
            $moduleName = $module_name . 'Module';
            $module = new $moduleName;
        }
    }


    /**
     * Соберает все доступные url в один массив
     * @static
     * @param array $module_names имена доступных модулей
     */
    public static function collectorURL($module_names)
    {
        foreach ($module_names as $module_name) {
            $modPath = MODULES . $module_name . '/routes.php';
            if (file_exists($modPath)) {
                $module_path = require $modPath;
                ModuleManager::$_modules[$module_name] = $module_path;
            }
        }
    }

    /**
     * Регистрация всех модулей в системе
     * @param array $modules Массив с именами подключаемых модулей
     */
    public static function registrationModules($modules)
    {
        foreach($modules as $module_name) {
            ModuleManager::loadModule($module_name);
        }

    }
}
