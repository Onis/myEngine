<?php

class Test_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        Database::setTable('test');
    }

    function create($data)
    {
        $postData = array('theme' => $data['theme'],
            'question' => $data['question'],
            'correct_answer' => $data['correct_answer'],
            'incorrect_answers' => $data['incorrect_answers']);
        Database::insert($postData);
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