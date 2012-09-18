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
    }

    /**
     * Загрузка контроллера, второй параметр говорит о нескольких контроллерах
     * в одном модуле
     * @param string $name имя модуля и контроллера, если не изменно
     * @param bool $controllers имя контроллера
     * return string имя загружаемого контроллера
     */
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
     * Загрузка модели
     * @param string $module
     * @param bool $model
     */
    public function loadModel($module, $model = false)
    {
        $this->controller->loadModel($module, $model);
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