<?php

session_start();
include "constants.php";
include BASE_PATH . "bootstrap/config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "/libs/helper.php";

$dsn = "mysql:dbname={$database_config['db']};host={$database_config['host']}";
$user = $database_config["user"];
$pass = $database_config["password"];

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    diepage("Connection failed, Error: " . $e->getMessage());
}

include BASE_PATH . "/libs/lib-auth.php";
include BASE_PATH . "/libs/lib-folders.php";
include BASE_PATH . "/libs/lib-tasks.php";
// include BASE_PATH . "/proccess/ajaxHandler.php";