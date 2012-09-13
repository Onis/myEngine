<?php

class News_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        Database::setTable('data');
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