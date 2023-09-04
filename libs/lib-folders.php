<?php defined("BASE_PATH") or die("Permission Denied!");

function getCurrentUserId() 
{
    return 1;
}

function getFolders()
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $sql = "SELECT * FROM folders WHERE user_id = $currentUserId";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

function removeFolder(int $folderId)
{
    global $pdo;
    sleep(2);
    $id = (array)$folderId;
    $sql = "DELETE FROM folders WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($id);
    $rowCount = $stmt->rowCount();
    return $rowCount;
}

function addFolder($folderName) 
{
    global $pdo;
    $folders = getFolders();
    sleep(2);
    foreach ($folders as $folder) {
        if ($folder->name == $folderName){
           return "$folderName folder already exists";
           die();
        }
    }
    $currentUserId = getCurrentUserId();
    $sql = "INSERT INTO folders (name,user_id) VALUES (:folderName,:userId)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":folderName" => "$folderName",":userId" => $currentUserId]);
    // echo "Folder $folderName successfully add";
    return $stmt->rowCount();
}


