<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();

$env = function (?string $key = null, $default = null):mixed {
    if(empty($key)) return $_ENV;
    return $_ENV[$key] ?? $default;
};
