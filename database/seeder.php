<?php

require '../config/app.php';

$db_driver = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
$tables = file_get_contents('create_tables.sql');
$users = file_get_contents('create_users.sql');
$categories = file_get_contents('create_categories.sql');
$posts = file_get_contents('create_posts.sql');
$postCategories = file_get_contents('create_post_categories.sql');

$db_driver->exec($tables);
$db_driver->exec($users);
$db_driver->exec($categories);
$db_driver->exec($posts);
$db_driver->exec($postCategories);
