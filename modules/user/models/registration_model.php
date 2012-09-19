<?php

class Registration_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Database::setTable('user');
    }

    public function create()
    {
        $login = $this->checkValidation('login', $_POST['login']);
        $password = $this->checkValidation('password', $_POST['password']);
        if($this->check() === false){
            return false;
        };

        $postData = array(
            'login' => $login,
            'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY),
            'role' => $_POST['role']
        );
        Database::insert($postData);
    }
}