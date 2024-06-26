<?php
require_once "./includes/signup_view.inc.php";
require_once "./includes/config_session.inc.php";
require_once "./includes/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NL:wght@100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./index.css">
</head>

<body>
    <main class="auth-section">
        <h1 class="logo">Blogged</h1>
        <div class="signup-div">
            <h3 class="header">Signup</h3>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input class="input username" type="text" name="username" placeholder="username" />
                <input class="input password" type="password" name="password" placeholder="password" />
                <input class="input email" type="text" name="email" placeholder="email" />
                <div class="btn-div">
                    <button class="btn">Signup</button>
                </div>
            </form>
            <?php
            check_signup_errors();
            ?>
        </div>
        <div class="divider-container"> 
            <div class="divider"></div>
        </div>
        <div class="login-div">
            <h3 class="header">Login</h3>
            <form class="login-form" action="includes/login.inc.php" method="post">
                <input class="input username" type="text" name="username" placeholder="username" />
                <input class="input password" type="password" name="password" placeholder="password" />
                <div class="btn-div">
                    <button class="btn">Login</button>
                </div>
            </form>
            <?php
            check_login_errors();
            ?>
        </div>
    </main>
</body>

</html>