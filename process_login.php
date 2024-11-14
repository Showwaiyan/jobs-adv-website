<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include_once('settings.php');
include ('processEOI.php');
$con = @mysqli_connect($host, $user, $pwd, $sql_db);
if (isset($_POST['login'])) {
    session_start();
    
    // $username = mysqli_real_escape_string($con, $_POST['user']);
    // $password = mysqli_real_escape_string($con, $_POST['pass']);
    $username = sanitize_input($_POST['user']);
    $password =sanitize_input( $_POST['pass']);
    $password = md5($password);
    $att = 0;
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $q2 = "UPDATE users set last_attempt = now(),login_attempts=$att where username='$username'";
    $result = mysqli_query($con, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        mysqli_query($con, $q2);
        header('Location: manage.php');
    } else {
        echo 'hhehhehee';
        $attempt = "SELECT login_attempts FROM users where username='$username'";
        $attempt_q = mysqli_query($con, $attempt);
        



        $attempt_r = mysqli_fetch_assoc($attempt_q);
        $attempt_r = $attempt_r['login_attempts'] + 1;
        echo $attempt_r;
        $q = "UPDATE users set login_attempts = '$attempt_r' where username='$username'";
        $result = mysqli_query($con, $q);
        if($attempt_r >= 3){
            echo '<p class="error-message">Too many login attempts. Please try again later.</p>';
            echo '<p class="back-to-home">Login Here <a href="login.php">Login</a></p>';
        } else {
            echo '<p class="error-message">Invalid username or password.</p>';
            echo '<p class="back-to-home">Login Here <a href="login.php">Login</a></p>';
        }
    }
}

if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $confpass = mysqli_real_escape_string($con, $_POST['confpass']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    if ($result and mysqli_num_rows($result) > 0) {
        echo '<p class="error-message">Username already exists.</p>';
        echo '<p class="back-to-home">Already have an account? <a href="login.php">Login</a></p>';
    } else {
        if ($password == $confpass) {
            $password = md5($password);
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            echo $query;
            $result = mysqli_query($con, $query);
            if ($result) {
                
                echo '<p class="success-message">Account created successfully.</p>';
                header('Location: login.php');
            } else {
                echo '<p class="error-message">Error creating account.</p>';
                header  ('Location: register.php');
            }
        } else {
            echo '<p class="error-message">Passwords do not match.</p>';
            header('Location: register.php');
        }
    }
}
?>
</body>
</html>