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
        $login = $this->checkValidation('login', $_POST['login']);
        $password = Hash::create('md5', $this->checkValidation('password', $_POST['password']),HASH_PASSWORD_KEY);
        $this->check();
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