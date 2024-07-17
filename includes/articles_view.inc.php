<?php
declare(strict_types=1);
require_once "dbh.inc.php";
require_once "config_session.inc.php";
require_once "login_model.inc.php";
require_once "articles_model.inc.php";
require_once "articles.inc.php";




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
    $link = [
        'url' => '../article/article.php',
        'title' => 'Page 1',
        'target' => '_self',
        'class' => 'internal-link'
    ];

    if (!empty($articles)) {
        echo "<div class='articles-div'>";
        foreach ($articles as $article) {  
          $id = $article["id"];
           list($datePart, $timePart) = explode(' ', $article['created_at']);

           $date = DateTime::createFromFormat('Y-m-d', $datePart);

           $formattedDate = $date->format('F j, Y');

            echo "<div class='article-card'>";
            echo "<strong class='article-title'>{$article['article_title']}</strong>";
            echo "<h6 class='date-created'>Posted on $formattedDate  $timePart</h6>";
            echo "<a href='" . $link['url'] . "?id=$id' class='article-content'>{$article['article_content']}</a>";
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

       foreach ($errors as $error){
         echo "<p class='article-error'>$error</p>";
       }
       unset($_SESSION['articles_error']);
    } else if (isset($_GET["article"]) && $_GET["article"] === "success"){
        $successMessage = "";
        $_SESSION["success_message"] = $successMessage;
    }
}

function show_article($article){
    if (!empty($article)){
        foreach($article as $content){
            list($datePart, $timePart) = explode(' ', $content['created_at']);

            $date = DateTime::createFromFormat('Y-m-d', $datePart);
 
            $formattedDate = $date->format('F j, Y');
            echo "<p class='article-title'>{$content['article_title']}</p>";
            echo "<p class='article-date'>Posted on $formattedDate $timePart</p>";
            echo "<p class='article-content'>{$content['article_content']}</p>";
        }
    }else {
        echo "no data";
    }
}