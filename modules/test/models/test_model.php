<?php

class Test_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        Database::setTable('test');
    }

    /**
     * Вставка данных
     */
    function create()
    {
        $postData = array(
            'theme' => $_POST['theme'],
            'question' => $_POST['question'],
            'correct_answer' => $_POST['correct_answer'],
            'incorrect_answers' => $_POST['incorrect_answers']
        );
        Database::insert($postData);
    }

    /**
     * Выборка всех данных
     * @return array с результатом выборки
     */
    function select()
    {
        Database::select('*');
        return Database::getResult();
    }

    /**
     * Удаляет данные по id
     * @param int $id
     */
    function delete($id)
    {
        Database::delete(array('id'=>$id));
    }
}