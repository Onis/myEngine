<?php

class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('user/login');
    }

    function run()
    {
        $this->model->run();
    }
}