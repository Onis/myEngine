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

        if(empty($_POST['title']) && empty($_POST['text'])) {
            header('Location: ' . URL . 'news/create');
            return false;
        }
        $data = array(
            'title' => Validation::filter($_POST['title']),
            'text' => Validation::filter($_POST['text'])
        );
        $this->model->create($data);
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