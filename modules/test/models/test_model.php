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

    function randomRows()
    {
        Database::select('*');
        $rows = Database::getNumRows();
        $rows = range(1, $rows);
        shuffle($rows);
        return $rows;
    }

    function handlerQuestion($id)
    {
        Database::select('*', array('id'=>$id));
        $result = Database::getResult();
        $arrayAnswers = array();
        $arrayAnswers[] = $result[0]['correct_answer'];
        $question = $result[0]['question'];

        // обрабатываю строку с неправильными ответами
        $value['incorrect_answers'] = rtrim($result[0]['incorrect_answers'], ';');
        $array= explode(';', $value['incorrect_answers']);
        // заношу неправльные ответы в массив
        foreach($array as $key => $value ) {
            $arrayAnswers[] = $value;
        }
        shuffle($arrayAnswers);

        return array($question => $arrayAnswers);
    }

    function outputQuestions()
    {
        $arrayAnswers = array();
        $randomRows = $this->randomRows();
        foreach($randomRows as $key=>$value) {
            $arrayAnswers[$key] = $this->randomAnswers($value);
        }
        return $arrayAnswers;
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