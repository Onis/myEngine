<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->assign(array('userList' => $this->model->userList()));
        $this->render('index');
    }

    public function edit($id)
    {
        $this->assign(array('user' => $this->model->userSingleList($id)));
        $this->render('edit');

    }

    public function editSave($id)
    {
        $this->model->editSave($id);
        if($this->model->check()) {
            header('Location: ' . URL . 'user');
        } else {
            header('Location: ' . URL . 'user/edit/'.$id);
        }


    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . URL . 'user');
    }



}