<?php
// bootstrap.php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

// Load environment variables from the project root .env file.
$dotenv = Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();

// Define an array of required variables.
$required = ['DB_DRIVER', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'];

foreach ($required as $var) {
    if (empty($_ENV[$var])) {
        throw new \Exception("Environment variable {$var} is not set.");
    }
}

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DB_DRIVER'],     // e.g., mysql
    'host'      => $_ENV['DB_HOST'],       // e.g., 127.0.0.1
    'database'  => $_ENV['DB_DATABASE'],   // your database name
    'username'  => $_ENV['DB_USERNAME'],   // your DB username
    'password'  => $_ENV['DB_PASSWORD'],   // your DB password
    'charset'   => $_ENV['DB_CHARSET'] ?? 'utf8',
    'collation' => $_ENV['DB_COLLATION'] ?? 'utf8_unicode_ci',
    'prefix'    => $_ENV['DB_PREFIX'] ?? '',
]);

// Make the Capsule instance available globally.
$capsule->setAsGlobal();

// Boot Eloquent ORM.
$capsule->bootEloquent();
