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
    function create($data)
    {
        Database::insert($data);
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