<?php

include "bootstrap/init.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_GET["action"];
    $params = $_POST;
    if($action == "signup"){
        if(!getUserEmail($params["email"]) == 1) {
            if (strlen($params["password"]) < 8) {
                echo "<script>alert('The password must have at least 8 charachter');</script>";
            }else{
                $result = signUP($params);
            }
        }else{
            echo "<script>alert('This email already has sign up! Please select another Email');</script>";
        }
    }elseif ($action == "login"){
        if(getUserEmail($params["email"]) == 1) {
            $result = logIn($params);
        }else{
            echo "<script>alert('This email dose not sign up yet! please register first');</script>";
        }
        
    }
}

include "tpl/tpl-auth.php";
