<?php 

include "../bootstrap/init.php";
if(!isAjaxRequest()){
    diepage("Invalid Request!");
}
if (!isset($_POST["action"]) || empty($_POST["action"])) {
    diepage("Invalid Action!");
}

switch($_POST["action"]){
    case "addfolder":
        if (!isset($_POST["input"]) || strlen($_POST["input"]) <2) {
            echo "The folder name must have at least 2 charachter";
            die();
        }
        echo addFolder($_POST["input"]);
    break;
    case "addtask":
        if (!isset($_POST["title"]) || strlen($_POST["title"]) <2) {
            echo "The Task title must have at least 2 charachter";
            die();
        }
        $currentFolderId = explode("=", $_POST["keyword"]);
        $folderId = (int)($currentFolderId[1]);
        addTask($_POST["title"], $_POST["body"], $folderId);
    break;
    default:
        diepage("Invalid Action!");
}
// var_dump($_POST);