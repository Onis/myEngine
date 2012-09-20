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
            'count' => $this->model->num_rows,
            'randomRows' => $this->model->randomRows(),
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

    function result()
    {
        $this->render('result');
    }

    function start()
    {
        $this->render('start');
    }

    function testing()
    {
        $this->assign(array(
            'arrayAnswers' => $this->model->randomAnswers(3),
            'randomRows' => $this->model->randomRows(),
        ));
        $this->render('testing');
    }
}