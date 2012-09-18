<?php

class News_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        Database::setTable('data');
    }

    /**
     * insert
     */
    function create()
    {
        $text = $_POST['text'];
        Database::insert(array('text' => $text));
    }

    /**
     * select
     * @return array
     */
    function select()
    {
        Database::select('*');
        return Database::getResult();
    }

    /**
     * delete
     * @param $id
     */
    function delete($id)
    {
        Database::delete(array('id'=>$id));
    }
}