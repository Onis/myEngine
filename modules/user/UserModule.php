<?php

    $module = new Module();
    $url = $module->getURL();
    $controller = $module->loadController($url[0]);
    print_r($url);
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
    require 'controllers/NewsModule.php';
    $controller = new Index();
    $controller->index();
    return false;
}

$file = 'controllers/' . $url[0] . '.php';
if(file_exists($file)) {
    require $file;
} else {
    require 'controllers/ErrorController.php';
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