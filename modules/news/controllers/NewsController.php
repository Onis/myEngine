<?php

class NewsController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('news/index');
    }

    function xhrInsert()
    {
        $this->model->xhrInsert();

    }

    function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing()
    {
        $this->model->xhrDeleteListing();
    }
}