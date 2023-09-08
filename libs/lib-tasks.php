<?php defined("BASE_PATH") or die("Permission Denied!");

function getTasks(){
    global $pdo;
    $userId = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id = $userId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}