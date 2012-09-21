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
        $theme = $this->filter($_POST['theme']);
        $question = $this->filter($_POST['question']);
        $correct_answer = $this->filter($_POST['correct_answer']);
        $incorrect_answers = $this->filter($_POST['incorrect_answers']);
        if($this->check() === false){
            return false;
        };
        $postData = array('theme' => $theme,
            'question' => $question,
            'correct_answer' => $correct_answer,
            'incorrect_answers' => $incorrect_answers);
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