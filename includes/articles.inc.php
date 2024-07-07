<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $articleTitle = $_POST["articleTitle"];
    $articleContent = $_POST["articleContent"];
  
    try{
        require_once "dbh.inc.php";
        require_once "articles_model.inc.php";

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

};