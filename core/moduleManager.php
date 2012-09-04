<?php

class ModuleManager
{

    /**
     *  Регистрирация всех модулей в системе
     */
    public function registrationModule($modules)
    {
        foreach($modules as $modName) {
            $this->loadModule($modName);
        }

    }

     /**
     *  Подключение модуля, находящегося в системе
     * @param string $modName
     */
    public function loadModule ($modName)
    {
        $mod_path = SITE_ROOT . '/modules/' . $modName . '/' . $modName . '.php';
        if (file_exists($mod_path))
        {
            include_once($mod_path);
        }
    }

    /**
     *  Возвращение списка всех модулей
     */
    public function returnModules($modules)
    {
        return $modules;
    }

}
