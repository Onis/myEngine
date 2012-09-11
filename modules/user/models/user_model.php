<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->createTableUser();
    }

    public function createTableUser()
    {
        $sql = "CREATE TABLE IF NOT EXISTS user
                (id SERIAL,
                login VARCHAR(50),
                password VARCHAR(50),
                role ENUM('default','admin','owner') NOT NULL DEFAULT  'default'
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $sth = $this->db->prepare($sql);
        $sth->execute();

    }

    public function userList()
    {
        return $this->db->select('SELECT id, login, role FROM user');
    }

    public function userSingleList($id)
    {
        return $this->db->select('SELECT id, login, role FROM user WHERE id = :id',array(':id' => $id));
    }

    public function create($data)
    {
        $this->db->insert('user', array(
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
        $this->db->update('user', $postData, "`id` = {$data['id']}");
    }

    public function delete($id)
    {
        $result = $this->db->select('SELECT role FROM user WHERE id = :id',array(':id' => $id));
        if ($result[0]['role'] == 'owner') {
            return false;
        }

        $this->db->delete('user', "id = $id");
    }
}