<?php

include 'config.php';

function __autoload($class)
{
    require 'core/' . $class . '.php';
}

$moduleManager = new ModuleManager();
$modName = $moduleManager->getModName();
if($modName) {
    $moduleManager->loadModule($modName);
} else {
    echo 'Module not found';
}