<?php

// Firs syntax to not allow permission on improtant file
/*if (!defined('BASE_PATH')) {
    echo "Permission Denied!";
    die();
}*/
// Second syntax to not allow permission on improtant file
defined("BASE_PATH") or die("Permission Denied!");

function isAjaxRequest(){
    if (!empty($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) == "xmlhttprequest") {
        return true;
    }
    return false;
}

function diepage($msg){
    echo "<div style='color: red; background-color: #fcebed; padding: 40px; margin: 50px auto; width: 70%; border: 2px solid palevioletred; border-radius: 8px;font-size: large'>".$msg."</div>";
    die();
}

function folderNameValidation(string $folderName) : bool {
    $validName = trim($folderName);
    if (!strlen($validName) == 0) {
        return true;
    } else {
        return false;
    }
    
}