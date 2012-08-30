<?php

class Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $name
     */
    public function loadModel($name)
    {
        $path = 'modules/' . $name . 'models/' . $name . '_model.php';
        if (file_exists($path)) {
            require 'modules/' . $name . 'models/' . $name . '_model.php';
            $modelName = $name . '_Model';
            $this->model = new $modelName;
        }

    }
}