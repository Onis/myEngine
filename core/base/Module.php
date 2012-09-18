<?php

class Module
{
    public $controller;
    public $url;

    public function __construct()
    {
        $this->getURL();
    }

    public function loadController($name, $controllers = false)
    {
        if($controllers == false) {
            $path = MODULES . $name . '/controllers/' . $name . 'Controller.php';
        } else {
            $path = MODULES . $name . '/controllers/' . $controllers . 'Controller.php';
        }
        if (file_exists($path)) {
            require $path;
            if($controllers == false) {
                $controllerName = $name . 'Controller';
            } else {
                $controllerName = $controllers . 'Controller';
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

    public function bootstrapping()
    {
        if (empty($this->url[1])) {
            $this->loadIndexMethod();
            return false;
        }

        if(isset($this->url[2])) {
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