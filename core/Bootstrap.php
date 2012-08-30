<?php

class Bootstrap
{
    //private $_config;

    public function __construct()
    {
        require '/../config.php';

        require CORE . '/ModuleManager.php';

        require BASE . '/Controller.php';
        require BASE . '/Model.php';
        require BASE . '/View.php';

        require CORE . '/Database.php';

        //require '';
    }

}
