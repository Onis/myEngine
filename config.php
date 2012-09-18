<?php
define('MODULES', dirname(__FILE__) . '/modules/');

define('URL', 'http://localhost/MyEngine/');
define('HASH_GENERAL_KEY', 'MixUp200');
define('HASH_PASSWORD_KEY', 'catsFlyHigh2000miles');


return array(
    'DB' => array(
        'type' => 'mysql',
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '123',
        'dbname' => 'mvc',
    ),
    'Modules' => array(
        'user',
        'news',
        'test',
    ),
);