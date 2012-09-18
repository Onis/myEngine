<?php

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('user/login');
    }

    public function run()
    {
        $this->model->run();
    }
}