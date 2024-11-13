<?php
session_start();
include('settings.php');

$con = @mysqli_connect($host, $user, $pwd, $sql_db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Login page">
    <!-- <?php include 'header.inc'; ?> -->
    <title>Manager Login | ByteMe</title>
    <link rel="stylesheet" href="style.css">
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
                <form class="login-form" method="post">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" placeholder="example@gmail.com" required>

                    <label for="pass">Password</label>
                    <input type="password" name="pass" id="pass" maxlength="45" pattern="^[a-zA-Z0-9\s,.'-]{0,40}$" required>

                    <input class="login-button" type="submit" name="login" value="Log In">
                </form>

                <?php
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($con, $_POST['user']);
                    $password = mysqli_real_escape_string($con, $_POST['pass']);

                    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_assoc($result);

                    if ($row) {
                        $_SESSION['user_id'] = $row['user_id'];
                        header('Location: manage.php');
                        exit;
                    } else {
                        echo '<p class="error-message">Invalid Username or Password.</p>';
                        echo '<p class="back-to-home">Not an HR Manager? <a href="index.php">Go back to Home</a></p>';
                    }
                }
                ?>
            </div>
        </div>
        <!-- <?php include_once "footer.inc"; ?> -->
    </div>
</body>

</html>