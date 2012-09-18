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
        $this->view->newsList = $this->model->select();
        $this->view->render('news/index');
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
     * Осуществляет выборку
     */
    function select()
    {
        $this->model->xhrGetListings();
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