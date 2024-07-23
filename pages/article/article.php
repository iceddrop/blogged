<?php

require_once "../../includes/config_session.inc.php";
require_once "../../includes/articles_model.inc.php";
require_once "../../includes/dbh.inc.php";
require_once "../../includes/articles_view.inc.php";
require_once "../../includes/login_model.inc.php";
require_once "../../includes/articles.inc.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: /blogged/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="article.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NL:wght@100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a href="#">Navbar</a>
            <button class="navbar-toggler" id="navbar-toggler">
                <span class="navbar-toggler-icon">&#9776;</span>
            </button>
        </div>
        <div class="navbar-menu" id="navbar-menu">
            <a href="index.php" class="nav-item">Home</a>
            <a href="features.php" class="nav-item">Features</a>
            <a href="pricing.php" class="nav-item">Pricing</a>
            <a href="contact.php" class="nav-item">Contact</a>
        </div>
    </nav>
    <div class="btn-div">
        <button type="button" class="edit-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit</button>
        <button class="delete-btn">Delete</button>
    </div>
    <section class="article-section">
        <?php
        try {
            $id = $_GET['id'];

            if ($pdo !== null) {
                $article = get_article($pdo, $id);
                show_article($article);
            } else {
                die("PDO is null. Database connection failed.");
            }
            exit();
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./article.js"></script>
</body>

</html>