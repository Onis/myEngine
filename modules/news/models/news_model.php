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
        $title = $this->filter($_POST['title']);
        $text = $this->filter($_POST['text']);
        $this->check();
        $data = array(
            'title' => $title,
            'text' => $text
        );
        Database::insert($data);
    }

    /**
     * select
     * @return array
     */
    function select()
    {
        Database::select('*');
        $data = Database::getResult();
        echo json_encode($data);
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