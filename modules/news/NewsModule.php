<?php
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

    //print_r($url);
    require 'controllers/NewsController.php';
    $controller = new NewsController();
    $controller->loadModel($url[0]);
    if (empty($url[1])) {
        $controller->index();
        return false;
    }


    if(isset($url[1])) {
        if (method_exists($controller, $url[1])) {
            $controller->{$url[1]}($url[2]);
        } else {
            echo 'offff';
        }
    } else {
        if(isset($url[1])) {
            $controller->{$url[1]}();
        } else {
            $controller->index();
        }
    }