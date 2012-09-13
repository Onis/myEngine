<?php

class News_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        $this->createTableNews();
        Database::setTable('data');

    }

    public function createTableNews()
    {
        $sql = "CREATE TABLE IF NOT EXISTS data
                (id serial,
                text varchar(255)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        Database::exeQuery($sql);
    }

    function create()
    {
        $text = $_POST['text'];
        Database::insert(array('text' => $text));
    }

    function select()
    {
        Database::select('*');
        return Database::getResult();
    }

    function delete($id)
    {
        Database::delete(array('id'=>$id));
    }
}