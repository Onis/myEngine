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
        $postData = array(
            'login' => $_POST['login'],
            'password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY),
            'role' => $_POST['role']
        );
        Database::insert($postData);
    }
}