<?php

require_once __DIR__ . '/../config/app.php';
require_once APPLICATION . '/vendor/autoload.php';

use App\Container\Container;
use App\Core\Database\DatabaseSeeder;

$container = Container::instance(require_once APPLICATION . '/app/Container/Dependencies.php');

$container->get(DatabaseSeeder::class)->run();

echo "Database seeded successfully.\n";