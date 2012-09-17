<?php

class Module
{
    public $controller;
    public $url;

    public function __construct()
    {
        $this->getURL();
    }

    public function loadController($name, $controller = false)
    {
        if($controller == false) {
            $path = MODULES . $name . '/controllers/' . $name . 'Controller.php';
        } else {
            $path = MODULES . $name . '/controllers/' . $controller . 'Controller.php';
        }
        if (file_exists($path)) {
            require $path;
            if($controller == false) {
                $controllerName = $name . 'Controller';
            } else {
                $controllerName = $controller . 'Controller';
            }

            $this->controller = new $controllerName;
        }
    }

    public function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $this->url = $url;
    }

    public function loadModel($module, $model = false)
    {
        $this->controller->loadModel($module, $model);
    }

    public function loadMethods($param = false)
    {
        if (method_exists($this->controller, $this->url[1])) {
            if($param == true){
                $this->controller->{$this->url[1]}($this->url[2]);
            } else {
                $this->controller->{$this->url[1]}();
            }
        } else {
            throw new Exception('Method ' . $this->url[1]. ' not found!!');
        }
    }

    public function loadIndexMethod()
    {
        $this->controller->index();
    }


}