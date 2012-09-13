<?php

class Model
{
    public function __construct()
    {
        Database::connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        Database::setCharSet('utf8');
    }
}