<?php

class ModuleManager
{

    /**
     *  Регистрирация всех модулей в системе
     */
    public function registrationModule()
    {

    }

    /**
     *  Возвращение списка всех модулей
     */
    public function returnModules()
    {

    }

    /**
     *  Подключение всех модулей находящихся в системе
     * @param string $modName
     */
    public function loadModule ($modName)
    {
        $mod_path = SITE_ROOT . '/modules/' . $modName . '/index.php';
        if (file_exists($mod_path))
        {
            include_once($mod_path);
        }
    }
}