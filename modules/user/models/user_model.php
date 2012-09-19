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

    public function editSave($id)
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
        Database::update($postData, array('id'=>"{$id}"));
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