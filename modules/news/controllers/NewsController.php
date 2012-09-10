<?php

class NewsController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->newsList = $this->model->select();
        $this->view->render('news/index');
    }

    function create()
    {
        $this->model->create();
        header('Location: ' . URL . 'news');

    }

    function select()
    {
        $this->model->xhrGetListings();
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . URL . 'news');
    }
}