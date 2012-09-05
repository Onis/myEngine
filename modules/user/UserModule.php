<?php
    $url = isset($_GET['url']) ? $_GET['url'] : null;
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

    //print_r($url);
    require 'controllers/UserController.php';
    $controller = new UserController();
    $controller->loadModel($url[0]);
    if (empty($url[1])) {
        $controller->index();
        return false;
    }
    print_r($url);


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

/*
if (empty($url[0])) {
    require 'controllers/index.php';
    $controller = new Index();
    $controller->index();
    return false;
}

$file = 'controllers/' . $url[0] . '.php';
if(file_exists($file)) {
    require $file;
} else {
    require 'controllers/error.php';
    $controller = new Error();
    return false;
}

$controller = new $url[0];
$controller->loadModel($url[0]);

//Calling methods
if(isset($url[2])) {
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
*/