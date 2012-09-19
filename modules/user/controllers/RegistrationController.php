<?php
class RegistrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->render('registration');
    }

    public function create()
    {
        $this->model->create();
        if($this->model->check()) {
            header('Location: ' . URL . 'user');
        } else {
            header('Location: ' . URL . 'registration');
        }

    }
}