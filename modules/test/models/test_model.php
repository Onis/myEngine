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
     * @param array $data массив с данными
     */
    function create($data)
    {
        $postData = array('theme' => $data['theme'],
            'question' => $data['question'],
            'correct_answer' => $data['correct_answer'],
            'incorrect_answers' => $data['incorrect_answers']);
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