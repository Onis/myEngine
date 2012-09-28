<?php

define('URL', 'http://'.$_SERVER['SERVER_NAME'].'/');
define('HASH_GENERAL_KEY', 'MixUp200');
define('HASH_PASSWORD_KEY', 'catsFlyHigh2000miles');


return array(
    'DB' => array(
        'type' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123',
        'dbname' => 'mvc',
        'charset' => 'utf8',
    ),
    'Modules' => array(
        'user',
        'news',
        'test',
    ),
);