<?php

require_once __DIR__ . '/env_helper.php';

$appPath = env_value('APP_PATH', dirname(__DIR__));
$appPath = rtrim($appPath, '/\\') . DIRECTORY_SEPARATOR;

define('APPLICATION', $appPath);
define('HOST', env_value('APP_HOST', 'http://localhost'));
define('DOMAIN_SYM', env_bool('APP_DOMAIN_SYM', false));
define('DOMAIN_ADDITION', env_value('APP_DOMAIN_ADDITION', '/blog_demo'));

define('DB_HOST', env_value('DB_HOST', 'localhost'));
define('DB_USER', env_value('DB_USER', 'root'));
define('DB_PASS', env_value('DB_PASS', ''));
define('DB_NAME', env_value('DB_NAME', 'blog_demo'));
