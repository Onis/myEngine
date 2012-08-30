<?php

define ('SITE_ROOT', dirname(__FILE__));
define('CORE', dirname(__FILE__) . '/core');
define('BASE', dirname(__FILE__) . '/core/base');
define('DB_HOST', 'localhost');
define('DB_NAME', 'engine');
define('DB_USER', 'root');
define('DB_PASS', '123');

define('URL', 'http://localhost/MyEngine/');



// The sitewide hashkey, do not change this because it`s used for passwords!
// This is for other hash keys ... Not sure yet
define('HASH_GENERAL_KEY', 'MixitUp200');

// This is for database password only
define('HASH_PASSWORD_KEY', 'catsFLYhigh2000miles');
