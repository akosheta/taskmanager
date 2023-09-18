<?php defined("BASE_PATH") or die("Permission Denied!");

function getUserByEmail(string $email){
    global $pdo;
    $sql = "SELECT * FROM users WHERE email like :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":email" => $email]);
    $records = $stmt->fetch(PDO::FETCH_OBJ);
    return $records ?? null;
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
function isLoggedIn(){
    return isset($_SESSION["login"]) ? true : false;
}
function logIn(array $params){
    $email = $params["email"];
    $password = $params["password"];
    $user = getUserByEmail($email);
    if (is_null($user)) {
        return false;
    }
    if(password_verify($password,$user->password)){
        $_SESSION["login"] = $user;
        return true;
    }
    return false;
}
function logout() {
    unset($_SESSION["login"]);
}
