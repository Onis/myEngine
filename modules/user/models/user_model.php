<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        Database::setTable('user');
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
        Database::select('role', array('id'=>$id));
        $result = Database::getResult();
        if ($result[0]['role'] == 'owner') {
            return false;
        }
        Database::delete(array('id'=>$id));
    }
}