<?php

class Module
{
    /**
     * @var имя загружаеммого контроллера
     */
    public $controller;
    /**
     * @var полученный url
     */
    public $url;

    public function __construct()
    {
        $this->getURL();
        $this->loadController($this->url[0]);
        $this->loadModel($this->url[0]);
        $this->bootstrapping();
    }

    /**
     * Загрузка контроллера
     * @param string $controller имя загружаемого контроллера
     * @throws Exception
     */
    public function loadController($controller)
    {
        $path = 'modules/' . ModuleManager::$module . '/controllers/' . $controller . 'Controller.php';
        if (file_exists($path)) {
            include $path;
            $controllerName = $controller . 'Controller';
            $this->controller = new $controllerName;
        } else {
            throw new Exception('Incorrect file directory: '.$path.'. Controller not load!!');
        }
    }

    /**
     * Получает url
     * return Полученный url
     */
    public function getURL()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        $this->url = $url;
    }

    /**
     * @param string $model
     */
    public function loadModel($model)
    {
        $this->controller->loadModel($model);
    }

    /**
     * Загрузка методов
     * @param bool $param есть ли параметр у данного метода
     * @throws Exception
     */
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

    /**
     * Загрузка метода index
     */
    public function loadIndexMethod()
    {
        $this->controller->index();
    }

    /**
     * Самонастройка загрузки методов
     * @return bool
     */
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