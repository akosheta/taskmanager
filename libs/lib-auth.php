<?php defined("BASE_PATH") or die("Permission Denied!");

function getUserEmail(string $email){
    global $pdo;
    $sql = "SELECT email FROM users WHERE email like :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":email" => $email]);
    $records = $stmt->fetch(PDO::FETCH_OBJ);
    return $records;
}
function isLoggedIn(){
    return false;
}

function signUp(array $params){
    global $pdo;
    $userName = $params["username"];
    $email = $params["email"];
    $password = password_hash($params["password"],PASSWORD_BCRYPT);
    $sql = "INSERT INTO users(user_name,email,password) VALUES(:username,:email,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":username" => $userName ,":email" => $email ,":password" => $password]);
    return $stmt->rowCount() ? true : false;
}

function logIn(){
    
}