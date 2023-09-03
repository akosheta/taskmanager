<?php

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

function addFolder() 
{
    global $pdo;
    $sql = "INSERT INTO folders(name,user_id) values (?,?)";
    $pdo->prepare($sql, );
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