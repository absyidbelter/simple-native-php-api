<?php 

namespace app\config;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "../../.env");
$dotenv->load();

return [
    "database" => [
        "host" => $_ENV["DB_HOST"],
        "database" => $_ENV["DB_DATABASE"],
        "username" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"]
    ],
];
