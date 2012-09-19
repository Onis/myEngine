<?php

class NewsController extends Controller
{
    public $msg;
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Загружает вьюху index этого модуля и делает выборку всех данных
     */
    function index()
    {
        $newsList = $this->model->select();
        $this->assign(array('newsList'=>$newsList));
        $this->render('index');

    }

    /**
     * Закрывает начатую сессию
     */
    function logout()
    {
        Session::destroy();
        header('location: '.URL.'login');
        exit;
    }

    /**
     * Создает новость
     */
    function createNews()
    {
        ($this->model->create()) ?
            header('Location: ' . URL . 'news') :
            header('Location: ' . URL . 'news/create');
    }

    public function create()
    {
        $this->render('create');
    }

    /**
     * Удаление по id
     * @param int $id
     */
    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . URL . 'news');
    }
}