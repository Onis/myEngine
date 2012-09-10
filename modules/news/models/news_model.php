<?php

class News_Model extends Model
{
    function __construct()
    {
        parent::__construct();

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