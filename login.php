<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Login page">
    <title>Manager Login | ByteMe</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <?php require_once("header.inc");session_start()?>
    <section class="page-container">
        <div class="login-container">
            <!-- Navigation Menu -->
            <div class="login-card">
                <h1>Administrative Login</h1>
                <form class="login-form" method="post" action="process_login.php">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>
                    <?php if (isset($_SESSION['error_message'])){ echo "<p style = 'color:red; font-family:\"Inter\", sans-serif;margin:0.5rem 0;'>".$_SESSION['error_message']."</p>";}unset($_SESSION['error_message']);?>
                    <input class="login-button" type="submit" name="login" value="Log In">
                </form>
                <a href="register.php" class="register">Don't have an acccount? <br>Register Here!</a>
            </div>
        </div>
    </section>
    <?php require_once("footer.inc")?>
</body>

</html>