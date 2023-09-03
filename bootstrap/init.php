<?php

include "constants.php";
include "config.php";
include "vendor/autoload.php";
include "./libs/helper.php";

$dsn = "mysql:dbname={$database_config['db']};host={$database_config['host']}";
$user = $database_config["user"];
$pass = $database_config["password"];

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    diepage("Connection failed, Error: " . $e->getMessage());
}

include "./libs/lib-auth.php";
include "./libs/lib-folders.php";
include "./libs/lib-tasks.php";