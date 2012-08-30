<?php

class Model
{
    public function __construct()
    {
        $this->db = new MySqli('localhost', 'root', '123', 'engine');
    }
}