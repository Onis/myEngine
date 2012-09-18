<?php

class NewsController extends Controller
{
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
        Bootstrap::$smarty->assign('newsList', $newsList);
        $this->view->render('index');

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
    function create()
    {
        $this->model->create();
        header('Location: ' . URL . 'news');

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