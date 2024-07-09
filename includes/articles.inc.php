<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
  
    try{
        require_once "dbh.inc.php";
        require_once "articles_model.inc.php";
        require_once "articles_control.inc.php";

        create_article($pdo, $title, $content);
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

};