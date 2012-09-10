<?php

class Module
{
    public function __construct()
    {

    }

    public function loadController($name)
    {
        $path = MODULES . $name . '/controllers/' . $name . 'Controller.php';
        if (file_exists($path)) {
            require $path;
            $controllerName = $name . 'Controller';
            $controller = new $controllerName;
            return $controller;
        }
    }

    public function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}