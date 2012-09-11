<?php

class News_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->createTableNews();

    }

    public function createTableNews()
    {
        $sql = "CREATE TABLE IF NOT EXISTS data
                (id serial,
                text varchar(255)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }

    function create()
    {
        $text = $_POST['text'];
        $this->db->insert('data', array('text' => $text));
    }

    function select()
    {
        return $this->db->select('SELECT * FROM data;');
    }

    function delete($id)
    {
        $this->db->delete('data', "id = $id");
    }
}