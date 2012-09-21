<?php

class Testing_Model extends Model
{
    public $rows;
    function __construct()
    {
        parent::__construct();
        Database::setTable('test');
    }

    /**
     * Узнает сколько записей в таблице, заносит их в массив по порядку
     * и перемешивает элементы массива в случайном порядке.
     * @return array
     */
    function randomRows()
    {
        Database::select('*');
        $this->rows = Database::getNumRows();
        $rows = range(1, $this->rows);
        shuffle($rows);
        return $rows;
    }

    /**
     * Обрабатывает вопрос из БД
     * @param int $id id, по которому производится выборка вопроса
     * @return array
     */
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

    /**
     * Вывод вопросов в случайном порядке
     * @param int $count количество вопросов
     * @return array
     */
    public function outputQuestions($count)
    {
        $arrayAnswers = array();
        $randomRows = $this->randomRows();
        for($i=0; $i<$count; $i++) {
            $arrayAnswers[$i] = $this->handlerQuestion($randomRows[$i]);
        }
        return $arrayAnswers;
    }

    /**
     * Подсчитывает сколько будет вопросов
     * @return int
     */
    public function countQuestions()
    {
        $this->randomRows();
        $countQuestions = $this->checkValidation('integer', $_POST['count']);
        if($this->check() === false){
            return false;
        };
        if(empty($countQuestions)) {
            $countQuestions=2;
        } elseif($countQuestions > $this->rows) {
            $countQuestions = $this->rows;
        }
        return $countQuestions;
    }

    public $ololo;
    /**
     * Подсчитывает количество правильных ответов отвеченных на вопросы
     * @return int
     */
    public function countOfCorrectAnswers()
    {
        $countQuestions = 500;
        $correct_answer = 0;
        $this->ololo = 0;
        for($i=0; $i < $countQuestions ; $i++) {
            if(@$_POST['group'.$i] == true) {
                $this->ololo += 1;
            }
            @$answer = $_POST['group'.$i];
            Database::select('*' , array('correct_answer'=>$answer));
            $count = Database::getNumRows();
            if ($count > 0) {
                $correct_answer += 1;
            }
        }
        return $correct_answer;
    }

    /**
     * Вывод оценки
     */
    public function outputMark()
    {
        $percent = $this->outputPercentCorrectAnswers();
        if($percent < 50) {
            $mark = 2;
        } elseif($percent >= 50 && $percent < 70) {
            $mark = 3;
        } elseif($percent >= 70 && $percent < 90) {
            $mark = 4;
        } else {
            $mark = 5;
        }
        return $mark;
    }

    /**
     * Вывод процента правильных ответов
     */
    public function outputPercentCorrectAnswers()
    {
        $correct_answer = $this->countOfCorrectAnswers();
        $ololo = $this->ololo;
        $percent = $correct_answer/$ololo*100;
        return $percent;
    }
}