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
        $data = array(
            'id' => $id,
            'login' => $_POST['login'],
            'password' => $_POST['password'],
            'role' => $_POST['role']
        );

        $this->model->editSave($data);
        header('Location: ' . URL . 'user');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header('Location: ' . URL . 'user');
    }



}