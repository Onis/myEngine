<?php

class ErrorController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->msg = 'This is Module Error!!';
        $this->view->render('error/index');
    }
}