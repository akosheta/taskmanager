<?php defined("BASE_PATH") or die("Permission Denied!");

function removeTask(int $taskId){
    global $pdo;
    sleep(2);
    $sql = "DELETE FROM tasks where id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["$taskId"]);
    return $stmt->rowCount();
}

function getTasks(){
    global $pdo;
    $folderId = $_GET["folder_id"] ?? null;
    $folderCondition = "";
    if (isset($folderId) && is_numeric($folderId)) {
        $folderCondition = "AND folder_id = $folderId";
    }
    $userId = getCurrentUserId();
    $sql = "SELECT * FROM tasks WHERE user_id = :userId $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":userId" => $userId]);
    $records = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $records;
}

function addTask(string $taskTitle , string $taskBody , int $folderId){
    global $pdo;
    $userId = getCurrentUserId();
    $sql = "INSERT INTO tasks (title,body,user_id,folder_id) VALUES (:title,:body,:userId,:folderId)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":title" => "$taskTitle" ,":body" => "$taskBody" ,":userId" => $userId,":folderId" => $folderId]);
    return $stmt->rowCount();
}