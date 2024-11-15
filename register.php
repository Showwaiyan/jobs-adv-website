<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   <?php require_once("header.inc");session_start();?> 
   <section class="page-container">
        <div class="login-container">
            <!-- Navigation Menu -->
            <div class="login-card">
                <h1>Registeration</h1>
                <form class="login-form" method="post" action="process_login.php">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <label for="confpass">Confirm Password</label>
                    <input type="password" name="confpass" id="confpass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>
                    <?php if (isset($_SESSION['error_message'])){ echo "<p style = 'color:red; font-family:\"Inter\", sans-serif;margin:0.5rem 0;'>".$_SESSION['error_message']."</p>";}unset($_SESSION['error_message']);?>
                    <input class="signin-button" type="submit" name="signup" value="Sign Up">
                    <a href="login.php" class="register">Already have an account?<br> Login Here!</a>
                </form>
            </div>
        </div>
    </section>
   <?php require_once("footer.inc")?>
</body>
</html>