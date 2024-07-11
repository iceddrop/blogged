<?php

declare(strict_types=1);

//queries the database for username based on user input
function get_username(object $pdo, string $userName){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":username", $userName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


//queries the database for email based on user input
function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email= :email;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function create_user(object $pdo, string $pwd, string $userName, string $email){
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";

    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(':username', $userName);
    $stmt->bindParam(':pwd', $hashedPwd);
    $stmt->bindParam(':email', $email);  
    $stmt->execute();
}