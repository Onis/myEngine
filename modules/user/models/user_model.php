<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->createTableUser();
        Database::setTable('user');
    }

    public function createTableUser()
    {
        Database::createTable('user', array(
            'id'=>'Serial',
            'login'=>'VARCHAR(50)',
            'password'=>'VARCHAR(50)',
            'role'=>"ENUM('default','admin','owner') NOT NULL DEFAULT  'default'")
        );

    }

    public function userList()
    {
        Database::select('id, login, role');
        return Database::getResult();
    }

    public function userSingleList($id)
    {
        Database::select('id, login, role', array('id'=>$id));
        return Database::getResult();
    }

    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        Database::update($postData, array('id'=>"{$data['id']}"));
    }

    public function delete($id)
    {
        Database::select("'id', 'login', 'role'", array('id'=>$id));
        $result = Database::getResult();
        if ($result[0]['role'] == 'owner') {
            return false;
        }

        Database::delete(array('id'=>$id));
    }
}