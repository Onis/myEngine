<?php

class ModuleManager
{

    /**
     * Регистрирация всех модулей в системе
     * @param array $modules Массив с именами подключаемых модулей
     */
    public function registrationModules($modules)
    {
        foreach($modules as $modName) {
            $this->loadModule($modName);
        }

    }

     /**
     * Подключение модуля, находящегося в системе
     * @param string $modName Имя подключаемого модуля
     */
    public function loadModule ($module_name)
    {
        $module_path = SITE_ROOT . '/modules/' . $module_name . '/' . $module_name . '.php';
        if (file_exists($module_path))
        {
            include_once($module_path);
        }
    }
}
