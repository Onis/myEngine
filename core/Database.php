<?php

Class Database extends MySqli
{
    public function __construct($db_host, $db_user, $db_pass, $db_name)
    {
        $this->db = parent::__construct($db_host, $db_user, $db_pass, $db_name);
    }

}