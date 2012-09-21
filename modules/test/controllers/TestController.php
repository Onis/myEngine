<?php

class TestController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Переходит на index вьюху и выводит содержимое вопросов
     */
    function index()
    {
        $this->assign(array(
            'testList' => $this->model->select(),
        ));
        $this->render('index');
    }

    /**
     * Создание вопроса
     */
    function createQuestion()
    {

        $this->model->create();
        if($this->model->check()) {
            header('Location: ' . URL . 'test');
        } else {
            header('Location: ' . URL . 'test/create');
        }

    }

    /**
     * Переход на create вьюху
     */
    function create()
    {
        $this->render('create');
    }
}