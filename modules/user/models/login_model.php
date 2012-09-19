<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Database::setTable('user');
    }

    public function run()
    {
        $this->checkValidation('login', $_POST['login']);
        $this->checkValidation('password', $_POST['password']);
        if ($this->msg) {
            echo $this->msg;
            return false;
        }

        $login = $_POST['login'];
        $password = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        Database::select("'id', 'role'", array('login'=>$login, 'password'=>$password), 'and');
        $data = Database::getResult();

        $count = Database::getNumRows();
        if ($count > 0) {
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            header('Location: ../news');
        } else {
            header('Location: ../login');
        }
    }
}