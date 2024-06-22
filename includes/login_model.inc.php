<?php

declare(strict_types=1);


//queries the database for username based on user input
function get_user(object $pdo, string $userName){
    $query = "SELECT * FROM users WHERE username= :username;";
    $stmt = $pdo->prepare($query);
    $stmt ->bindParam(":username", $userName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
};