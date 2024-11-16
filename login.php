<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Login page">
    <title>Manager Login | ByteMe</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="page-container">
        <div class="login-container">
            <!-- Navigation Menu -->
            <?php
            $page = "Log In Page";
            // include_once 'menu.inc';
            ?>
            <div class="login-card">
                <h1>Administrative Login</h1>
                <form class="login-form" method="post" action="process_login.php">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" placeholder="eg.Alex123" required>

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <input class="login-button" type="submit" name="login" value="Log In">
                </form>

               
            </div>
        </div>
        <!--  -->
    </div>
    <?php include_once "footer.inc"; ?>
</body>

</html>