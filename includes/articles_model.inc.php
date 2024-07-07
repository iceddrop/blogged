<?php

declare(strict_types=1);

function create_user(object $pdo, string $articleTitle, string $articleContent){
    $query = "INSERT INTO articles (articleTitle, articleContent) VALUES (:articleTitle, :articleContent);";

    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    
   

    $stmt->bindParam(':articleTitle', $articleTitle);
    $stmt->bindParam(':articleContent', $articleContent);  
    $stmt->execute();
}