<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Загрузка модели
     * @param string $name имя модуля и модели, если не изменно
     * @param bool $model Имя модели
     */
    public function loadModel($name, $model = false)
    {
        if($model == false) {
            $path = MODULES . $name . '/models/' . $name . '_model.php';
        } else {
            $path = MODULES . $name . '/models/' . $model . '_model.php';
        }
        if (file_exists($path)) {
            require $path;
            if($model == false){
                $modelName = $name . '_model';
            } else {
                $modelName = $model . '_model';
            }
            $this->model = new $modelName;
        } else {
            throw new Exception('Incorrect file directory: '.$path.'. Model not load!!');
        }
    }
}