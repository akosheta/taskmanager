<?php

include "bootstrap/init.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_GET["action"];
    $params = $_POST;
    if($action == "signup"){
        if(!getUserByEmail($params["email"]) == 1) {
            if (strlen($params["password"]) < 8) {
                echo "<script>alert('The password must have at least 8 charachter');</script>";
            }else{
                $result = signUP($params);
                if ($result) {
                    echo "<script>alert('You successfully signed up')</script>";
                } else {
                    echo "<script>alert('An error occured! please try again')</script>";
                }
            }
        }else{
            echo "<script>alert('This email already has sign up! Please select another Email or login');</script>";
        }
    }elseif ($action == "login"){
            $result = logIn($params);
            if ($result) {
                echo "<script>alert('You successfully logged in ...');</script>";
                header("Location: index.php");
            } else {
                echo "<script>alert('The email or password is incorrect please try again');</script>";
            }
    }
}

include "tpl/tpl-auth.php";
