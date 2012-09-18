<?php

class UserModule extends Module
{
    public function __construct()
    {
        parent::__construct();

        $this->loadController('user', $this->url[0]);
        $this->loadModel('user', $this->url[0]);
        $this->bootstrapping();
    }
}