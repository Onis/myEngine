<?php

class Model
{
    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect('localhost', DB_USER, DB_PASS, DB_NAME);
    }
}