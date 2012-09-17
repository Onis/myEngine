<?php

class TestController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->testList = $this->model->select();
        $this->view->render('test/index');
    }

    function createQuestion()
    {
        $data = array();
        $data['theme'] = $_POST['theme'];
        $data['question'] = $_POST['question'];
        $data['correct_answer'] = $_POST['correct_answer'];
        $data['incorrect_answers'] = $_POST['incorrect_answers'];
        $this->model->create($data);
        header('Location: ' . URL . 'test');
    }

    function create()
    {
        $this->view->render('test/create');
    }
}