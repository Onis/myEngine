<?php

class IndexController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('index/index');
    }

    function details()
    {
       $this->view->render('index/index');
    }
}