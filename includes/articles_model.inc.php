<?php

declare(strict_types=1);

function create_article(object $pdo, string $title, string $content){
    $query = "INSERT INTO articles (article_title, article_content) VALUES (:article_title, :article_content);";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':article_title', $title);
    $stmt->bindParam(':article_content', $content);  
    $stmt->execute();
};

function get_articles(object $pdo){
    $query = "SELECT article_title, article_content, created_at FROM articles;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
};
