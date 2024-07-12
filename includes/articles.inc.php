<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    try {
        require_once "dbh.inc.php";
        require_once "articles_model.inc.php";
        require_once "articles_control.inc.php";

        $error = [];

        if (check_for_empty_input($title, $content)) {
            $error["empty_input"] = "Fill all fields";
        }

        //stores error inside the session
        require_once "config_session.inc.php";
        if ($error) {
            $_SESSION["articles_error"] = $error;
            header("Location: {$_SERVER['PHP_SELF']}");
            die();
        };
        create_article($pdo, $title, $content);
        header("Location: {$_SERVER['PHP_SELF']}");
        $pdo = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
