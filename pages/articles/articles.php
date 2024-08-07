<?php
require_once "../../includes/config_session.inc.php";
require_once "../../includes/articles_model.inc.php";
require_once "../../includes/dbh.inc.php";
require_once "../../includes/articles_view.inc.php";
require_once "../../includes/login_model.inc.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: /blogged/index.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    try {
        create_article($pdo, $title, $content);
        // Redirect to the same page to avoid resubmission on refresh
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

$articles = get_articles($pdo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="articles.css">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NL:wght@100..400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: white;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Blogged</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../homepage/homepage.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../articles/articles.php">My Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../articles/articles.php">All Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search Article" aria-label="Search">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
        try {
            $userName = $_SESSION["user_username"];
            $users = get_username($pdo, $userName);
            // Check and display the fetched data
            show_username($users);
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        ?>
        <div class="article-div">
            <h3 class="article-header">My Articles</h3>
            <form class="article-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" class="article-title-input" name="title" placeholder="Article title" />
                <textarea class="article-input" name="content" placeholder="Type your article into this place"></textarea>
                <div class="article-btn-div">
                    <button class="article-btn">Post Article</button>
                </div>
            </form>
            <?php
            display_article_error();
            if(empty($_SESSION["success_message"])){
                echo $_SESSION["success_message"] = "<p class='article-success'>Article posted successfully!</p>";
            }
            ?>
        </div>
        <?php
        show_articles($articles);
        ?>
           
    </section>
    <script type="text/javascript" src="../article/article.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>