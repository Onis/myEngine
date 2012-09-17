<?php

class TestModule extends Module
{
    public function __construct()
    {
        parent::__construct();

        $this->loadController($this->url[0]);
        $this->loadModel($this->url[0]);

        if (empty($this->url[1])) {
            $this->loadIndexMethod();
            return false;
        }

        if(isset($this->url[2])) {
            $this->loadMethods(true);
        } else {
            if(isset($this->url[1])) {
                $this->loadMethods();
            } else {
                $this->loadIndexMethod();
            }
        }
    }
}