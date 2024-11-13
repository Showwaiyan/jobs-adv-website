<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Login page">
    <title>Manager Login | ByteMe</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php require_once("header.inc")?>
    <section class="page-container">
        <div class="login-container">
            <!-- Navigation Menu -->
            <div class="login-card">
                <h1>Administrative Login</h1>
                <form class="login-form" method="post">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <input class="login-button" type="submit" name="login" value="Log In">
                </form>
                <a href="register.php" class="register">register?</a>
            </div>
        </div>
    </section>
    <?php require_once("footer.inc")?>
</body>

</html>