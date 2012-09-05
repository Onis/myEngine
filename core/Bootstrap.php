<?php

class Bootstrap
{
    const PATH_CONFIG = 'C:/wamp/www/MyEngine/config.php';

    public function __construct()
    {
         $this->_config = require Bootstrap::PATH_CONFIG;

        require CORE . 'ModuleManager.php';

        require BASE . 'Controller.php';
        require BASE . 'Model.php';
        require BASE . 'View.php';

        require CORE . 'Database.php';

        return $this->_config;


        //require '';
    }

}
