<?php

class IndexController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Загружает вьюху index в данном модуле
     */
    function index()
    {
        $this->render('index');
    }
}