<?php

class Bootstrap
{
    //private $_config;

    public function __construct()
    {
         $this->_config = require '/../config.php';

        require CORE . '/ModuleManager.php';

        require BASE . '/Controller.php';
        require BASE . '/Model.php';
        require BASE . '/View.php';

        require CORE . '/Database.php';

        return $this->_config;


        //require '';
    }

}
