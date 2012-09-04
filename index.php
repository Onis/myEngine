<?php

include 'core/Bootstrap.php';

$app = new Bootstrap();

$moduleManager = new ModuleManager();
var_dump($moduleManager->returnModules($app->_config));