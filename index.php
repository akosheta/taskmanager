<?php

include "bootstrap/init.php";
if (isset($_GET["logout"])) {
    logout();
}
if(!isLoggedIn()){
    //redirect to auth form
    header("Location: auth.php");
}
if (isset($_GET["delete_folder"]) && is_numeric($_GET["delete_folder"])) {
    $deletedCount = removeFolder($_GET["delete_folder"]);
    // echo "$deletedCount Folder saccessfully deleted";
}
if (isset($_GET["delete_task"]) && is_numeric($_GET["delete_task"])) {
    $deletedCount = removeTask($_GET["delete_task"]);
    // echo "$deletedCount Task saccessfully deleted";
}
$folders = getFolders();
$tasks = getTasks();
// dd($tasks);
include BASE_PATH . "tpl/tpl-index.php";