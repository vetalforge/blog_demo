<?php

if (!function_exists('env_value')) {
    function env_value(string $key, mixed $default = null): mixed
    {
        $value = getenv($key);

        return $value === false ? $default : $value;
    }
}

if (!function_exists('env_bool')) {
    function env_bool(string $key, bool $default = false): bool
    {
        return filter_var(env_value($key, $default), FILTER_VALIDATE_BOOLEAN);
    }
}

define('APPLICATION', rtrim(env_value('APP_PATH', dirname(__DIR__)), '/\\') . DIRECTORY_SEPARATOR);

define('HOST', env_value('APP_HOST', 'http://localhost'));
define('DOMAIN_SYM', env_bool('APP_DOMAIN_SYM', false));
define('DOMAIN_ADDITION', env_value('APP_DOMAIN_ADDITION', '/blog_demo'));

define('DB_HOST', env_value('DB_HOST', 'localhost'));
define('DB_USER', env_value('DB_USER', 'root'));
define('DB_PASS', env_value('DB_PASS', ''));
define('DB_NAME', env_value('DB_NAME', 'blog_demo'));
