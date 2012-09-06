<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * @param string $name
     */
    public function loadModel($name)
    {
        $path = MODULES . $name . '/models/' . $name . '_model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $name . '_model';
            $this->model = new $modelName;
        }

    }
}