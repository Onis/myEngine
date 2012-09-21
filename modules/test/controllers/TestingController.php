<?php

class TestingController extends Controller
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
        $this->render('start');
    }

    function run()
    {
        $count = $this->model->countQuestions();
        if($this->model->check()) {
            $this->assign(array(
                'count' => $count,
                'arrayAnswers' => $this->model->outputQuestions($count),
            ));
            $this->render('testing');
        } else {
            header('Location: ' . URL . 'testing');
        }

    }

    function result()
    {
        $this->assign(array(
            'percentOfCorrectAnswers' => '??',
            'mark' => $this->model->countOfCorrectAnswers(),
        ));
        $this->render('result');
    }


}