<?php

class Model
{
    public $msg= '';
    public function __construct()
    {
        Database::connect(Bootstrap::$db['host'], Bootstrap::$db['user'], Bootstrap::$db['pass'], Bootstrap::$db['dbname'], Bootstrap::$db['charset']);

    }

    public function checkValidation($validateName, $value)
    {
        if(empty($value)) {
            $this->msg = '<h3>Complete all fields!!!!</h3>';
            return false;
        }
        return $this->loadValidation($validateName, $value);
    }

    public function loadValidation($validateName, $value)
    {
        $validate = 'is'.$validateName;
        if(Validation::$validate($value) == false){
            $this->msg .= '<h5>Incorrect data is entered in the field for ' . $validateName . '</h5>';
            return false;
        };
        return $value;
    }

    public function filter($value) {
        if(empty($value)) {
            $this->msg = '<h3>Complete all fields!!!!</h3>';
            return false;
        }
        Validation::filter($value);
    }
}