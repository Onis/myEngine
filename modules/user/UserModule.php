<?php

class UserModule extends Module
{
    public function __construct()
    {
        parent::__construct();

        $this->loadModel();

        if (empty($this->url[1])) {
            $this->loadIndexMethod();
            return false;
        }

        if(isset($this->url[1])) {
            $this->loadMethods(true);
        } else {
            if(isset($this->url[1])) {
                $this->loadMethods();
            } else {
                $this->loadIndexMethod();
            }
        }
    }
}


/*
if (empty($url[0])) {
    require 'controllers/NewsModule.php';
    $controller = new Index();
    $controller->index();
    return false;
}

$file = 'controllers/' . $url[0] . '.php';
if(file_exists($file)) {
    require $file;
} else {
    require 'controllers/ErrorController.php';
    $controller = new Error();
    return false;
}

$controller = new $url[0];
$controller->loadModel($url[0]);

//Calling methods
if(isset($url[2])) {
    if (method_exists($controller, $url[1])) {
        $controller->{$url[1]}($url[2]);
    } else {
        echo 'offff';
    }
} else {
    if(isset($url[1])) {
        $controller->{$url[1]}();
    } else {
        $controller->index();
    }
}
*/