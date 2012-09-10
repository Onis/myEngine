<?php

class ModuleManager
{

    public function __construct()
    {

    }

    static $_modules = array();

     /**
     * Подключение модуля, находящегося в системе
     * @param string $modName Имя подключаемого модуля
     */
    public static function loadModule ($module_name)
    {
        $module_path = MODULES . $module_name . '/' . $module_name . 'Module.php';
        if (file_exists($module_path))
        {
            include_once($module_path);
            $moduleName = $module_name . 'Module';
            @$module = new $moduleName;
            //return $module;
        }
    }


    /**
     * @static
     * @param array $module_names
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
