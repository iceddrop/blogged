<?php
require_once "../../includes/config_session.inc.php";
require_once "../../includes/articles_model.inc.php";
require_once "../../includes/dbh.inc.php";
require_once "../../includes/articles_view.inc.php";
require_once "../../includes/login_model.inc.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: /blogged/index.php");
}
$id = $_SESSION['user_id'];
$article = get_article($pdo, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        show_article($article);
    ?>
</body>
</html>