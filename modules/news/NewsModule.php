<?php

class NewsModule extends Module
{
    public function __construct()
    {
        parent::__construct();

        $this->loadController($this->url[0]);
        $this->loadModel($this->url[0]);
        $this->bootstrapping();
    }
}