<?php

define ('SITE_ROOT', dirname(__FILE__));
define('LIBS', dirname(__FILE__) . '/libs/');
define('MODULES', dirname(__FILE__) . '/modules/');
define('VIEWS', dirname(__FILE__) . '/views/');
define('CORE', dirname(__FILE__) . '/core/');
define('BASE', dirname(__FILE__) . '/core/base/');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'engine');
define('DB_USER', 'root');
define('DB_PASS', '123');

define('URL', 'http://localhost/MyEngine/');
define('HASH_GENERAL_KEY', 'MixUp200');
define('HASH_PASSWORD_KEY', 'catsFlyHigh2000miles');

return array(
    'user',
    'news',
);