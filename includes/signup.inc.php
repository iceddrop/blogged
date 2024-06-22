<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST["username"];
    $pwd = $_POST["password"];
    $email = $_POST["email"];

   try {
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_control.inc.php";

    //Error handlers
    $errors = [];

    if (is_input_empty($userName, $email, $pwd)){
        $errors["empty_input"] = "Fill all fields";
    };

    if (is_email_invalid($email)){
        $errors["invalid_email"] = "email is invalid";
    };

    if (is_username_taken($pdo, $userName)){
        $errors["username_taken"] = "Username is taken";
    };

    if (is_email_registered($pdo, $email)){
        $errors["email_registered"] = "Email is registered";
    };


    //stores error inside the session
    require_once "config_session.inc.php";
    if ($errors){
        $_SESSION["errors_signup"] = $errors;

        $signupData = [
            "username" => $userName,
            "email" => $email
        ];
        $_SESSION["signup_data"] = $signupData;

        header("Location:../index.php");
        die();
    };

     create_user($pdo, $pwd, $userName, $email);
     header("Location:../index.php?signup=sucess");

     $pdo = null;
     $stmt = null;

    die();
   } catch (PDOException $e) {
      die("Query failed: ". $e->getMessage());
   }

  //redirect users back to the index page if they try to access the submit page without giving any data
} else {
    header("Location: ../index.php");
};