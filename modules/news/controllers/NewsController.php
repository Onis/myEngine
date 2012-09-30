<?php

class NewsController extends Controller
{
    public $msg;
    function __construct()
    {
        parent::__construct();
        $this->assign(array('jsArray' => array("news/views/js/default.js")));
    }

    /**
     * Загружает вьюху index этого модуля и делает выборку всех данных
     */
    function index()
    {
        $this->render('index');
    }

    public function select()
    {
        $this->model->select();
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
        $this->model->create();
        header('Location: ' . URL . 'news');
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