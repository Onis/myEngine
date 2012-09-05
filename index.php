<?php

include 'core/Bootstrap.php';

$app = new Bootstrap();

$moduleManager = new ModuleManager();
var_dump($moduleManager->handlerURL($app->_config));