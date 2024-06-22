<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userName = $_POST["username"];
    $pwd = $_POST["password"];

    try{
        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_control.inc.php";
    
        //Error handlers
        $errors = [];
    
        if (is_input_empty($userName, $pwd)){
            $errors["empty_input"] = "Fill all fields";
        };

        $result = get_user($pdo, $userName);

        if (is_username_wrong($result)){
             $errors["login_incorrect"] = "Incorrect username info";
        };  
         
        if (!is_username_wrong($result) && does_password_match($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info";
        };

        //stores error inside the session
    require_once "config_session.inc.php";
    if ($errors){
        $_SESSION["errors_login"] = $errors;

        header("Location:../index.php");
        die();
    };

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result["id"];
    session_id($sessionId);

    $_SESSION["user_id"] = $result["id"];
    $_SESSION["user_username"] = htmlspecialchars($result["username"]); 

    $_SESSION['last_regeneration'] = time();

    header("Location: ../pages/homepage/homepage.php?login=success");
    $pdo = null;
    $statement = null;

    die();
    } catch (PDOException $e){
        die("Query failed: " .$e->getMessage());
    }
} else{
    header("Location: ../index.php");
    die();
}