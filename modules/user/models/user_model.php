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
        return $this->db->select("'id', 'login', 'role'");
    }

    public function userSingleList($id)
    {
        return $this->db->select("'id', 'login', 'role'",array('id' => $id));
    }

    public function create($data)
    {
        $this->db->insert(array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        ));
    }

    public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        $this->db->update($postData, array('id' => $data['id']));
    }

    public function delete($id)
    {
        $result = $this->db->select('role',array('id' => $id));
        if ($result[0]['role'] == 'owner') {
            return false;
        }

        $this->db->delete(array('id' => $id));
    }
}