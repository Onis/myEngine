<?php

class ModuleManager
{
    /**
     *
     * @return mixed
     */
    public function getModName()
    {
        return isset($_GET['url']) ? $_GET['url'] : null;
    }

    /**
     *
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