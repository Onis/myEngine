<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Загрузка модели
     * @param string $model имя загружаемой модели
     * @throws Exception
     */
    public function loadModel($model)
    {
        $path = 'modules/' . ModuleManager::$module . '/models/' . $model . '_model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $model . '_model';
            $this->model = new $modelName;
        } else {
            throw new Exception('Incorrect file directory: '.$path.'. Model not load!!');
        }
    }

    /**
     * @param string $name
     */
    public function render($name)
    {
        $this->view->render($name);
    }

    /**
     * @param array $data
     */
    public function assign($data)
    {
        foreach($data as $key=>$value) {
            $this->view->smarty->assign($key, $value);
        }
    }
}