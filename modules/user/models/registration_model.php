<?php

class Registration_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Database::setTable('user');
    }

    public function create($data)
    {
        Database::insert(array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }
}