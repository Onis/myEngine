<?php

class Model
{
    public function __construct()
    {
        Database::connect(Bootstrap::$db['host'], Bootstrap::$db['user'], Bootstrap::$db['pass'], Bootstrap::$db['dbname'], Bootstrap::$db['charset']);
    }
}