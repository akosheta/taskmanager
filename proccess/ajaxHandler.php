<?php 

include "../bootstrap/init.php";
if(!isAjaxRequest()){
    echo diepage("Invalid Request!");
}
if (!isset($_POST["action"]) || empty($_POST["action"])) {
    echo diepage("Invalid Action!");
}

switch($_POST["action"]){
    case "addfolder":
        if (!isset($_POST["input"]) || strlen($_POST["input"]) <3) {
            echo "The folder name must have at least 3 charachter";
            die();
        }
        echo addFolder($_POST["input"]);
    break;
    
    default:
        diepage("Invalid Action!");
}
// var_dump($_POST);