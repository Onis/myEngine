<?php

class ModuleManager
{
    /**
     * Регистрирация всех модулей в системе
     * @param array $modules Массив с именами подключаемых модулей
     */
    public function registrationModules($modules)
    {
        foreach($modules as $module_name) {
            $this->loadModule($module_name);
        }

    }

     /**
     * Подключение модуля, находящегося в системе
     * @param string $modName Имя подключаемого модуля
     */
    public function loadModule ($module_name)
    {
        $module_path = MODULES . $module_name . '/' . $module_name . '.php';
        if (file_exists($module_path))
        {
            include_once($module_path);
        }
    }

    public function handlerURL($module_names)
    {
        $module_root = array();
        foreach ($module_names as $module_name) {
            $modPath = MODULES . $module_name . '/routes.php';
            if (file_exists($modPath)) {
                $module_path = require $modPath;
                $module_root[$module_name] = $module_path;
            }
        }

        return $module_root;


    }
}
