<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>

<body>
    <main class="auth-section">
        <div class="signup-div">
            <h3>Signup</h3>
            <form class="signup-form" action="includes/signup.inc.php" method="post">
                <input type="text" name="username" placeholder="username" />
                <input type="text" name="email" placeholder="email" />
                <input type="password" name="password" placeholder="password" />
                <div class="btn-div">
                    <button>Signup</button>
                <div>
            </form>
        </div>
        <div class="login-div">
            <h3>Login</h3>
            <form class="login-form" action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="password" />
                <div class="btn-div">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>