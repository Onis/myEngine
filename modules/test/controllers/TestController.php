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
        $this->view->testList = $this->model->select();
        $this->view->render('test/index');
    }

    /**
     * Создание вопроса
     */
    function createQuestion()
    {
        $data = array(
            'theme' => $_POST['theme'],
            'question' => $_POST['question'],
            'correct_answer' => $_POST['correct_answer'],
            'incorrect_answers' => $_POST['incorrect_answers']
        );
        $this->model->create($data);
        header('Location: ' . URL . 'test');
    }

    /**
     * Переход на create вьюху
     */
    function create()
    {
        $this->view->render('test/create');
    }
}