<?php

class ErrorController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Загружает вьюху index и выдает сообщение
     */
    function index()
    {
        $this->assign(array('msg' => 'This is Module Error!!'));
        $this->render('index');
    }
}