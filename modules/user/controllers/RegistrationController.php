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
        if(Validation::isLogin($_POST['login']) == false || Validation::isPassword($_POST['password']) == false) {
            header('Location: ' . URL . 'registration');
            return false;
        }
        $data = array(
            'login' => $_POST['login'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        );
        $this->model->create($data);
        header('Location: ' . URL . 'user');

    }
}