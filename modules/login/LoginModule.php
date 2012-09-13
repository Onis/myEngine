<?php

class LoginModule extends Module
{
    public function __construct()
    {
        parent::__construct();

        $this->loadModel();

        if (empty($this->url[1])) {
            $this->loadIndexMethod();
            return false;
        }

        if(isset($this->url[1])) {
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