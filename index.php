<?php

include 'config.php';

function __autoload($class)
{
    require 'classes/' . $class . '.php';
}

$moduleManager = new ModuleManager();
$url = $moduleManager->getModName();
if($url) {
    $moduleManager->loadModule($url);
}



?>