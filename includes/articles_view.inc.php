<?php
declare(strict_types=1);
require_once "dbh.inc.php";
require_once "config_session.inc.php";
require_once "login_model.inc.php";
require_once "articles_model.inc.php";


function show_username($users){
      if (!empty($users)) {
         echo "<p class='welcome-text'> Welcome blogger ";
         foreach ($users as $user) {
            echo "<strong class='blogger-name'>{$user['username']},</strong>";
         }
         echo " express yourself.</p>";
      } else {
         echo "<p class='welcome-text'>You are not logged in and cannot create articles</p>";
      }
}

function show_articles($articles){
    if (!empty($articles)) {
        echo "<div class='articles-div'>";
        foreach ($articles as $article) {
            echo "<div class='article-card'>";
            echo "<strong class='article-title'>{$article['article_title']}</strong>";
            echo "<h6 class='date-created'>{$article['created_at']}</h6>";
            echo "<p class='article-content'>{$article['article_content']}</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p class='welcome-text'>You are not logged in and cannot create articles</p>";
    }
};

function display_article_error(){
    if (isset($_SESSION["articles_error"])){
       $errors = $_SESSION["articles_error"];

       echo $errors;
       unset($_SESSION['articles_error']);
    } else {
        echo "all good";
    }
}