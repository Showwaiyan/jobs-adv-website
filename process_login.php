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
$con = @mysqli_connect($host, $user, $pwd, $sql_db);
if (isset($_POST['login'])) {
    session_start();
    
    $username = sanitize_input($_POST['user']);
    $password = sanitize_input($_POST['pass']);
    $hashed_password = md5($password); // Use `password_hash` for stronger security.
    
    // Check the current login attempts and last attempt time
    $attempt_query = "SELECT login_attempts, last_attempt FROM users WHERE username='$username'";
    $attempt_result = mysqli_query($con, $attempt_query);
    
    if ($attempt_result && mysqli_num_rows($attempt_result) > 0) {
        $attempt_data = mysqli_fetch_assoc($attempt_result);
        $login_attempts = $attempt_data['login_attempts'];
        $last_attempt_time = strtotime($attempt_data['last_attempt']);
        $current_time = time();
        echo $current_time - $last_attempt_time;
        // Check if the user is in timeout
        if ($login_attempts >= 3 && ($current_time - $last_attempt_time) > 60) {
            echo '<p class="error-message">Too many login attempts. Please try again in 1 minute.</p>';
            echo '<p class="back-to-home">Login Here <a href="login.php">Login</a></p>';
        } else {
            // Reset login attempts after 1 minute if timeout has passed
            if ($login_attempts >= 3 && ($current_time - $last_attempt_time) >= 60) {
                $login_attempts = 0;
            }

            // Verify credentials
            $query = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Successful login
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $row['username'];
                
                // Reset login attempts and update last_attempt
                $reset_query = "UPDATE users SET login_attempts=0, last_attempt=NOW() WHERE username='$username'";
                mysqli_query($con, $reset_query);
                
                header('Location: manage.php');
                exit();
            } else {
                // Failed login, increment attempts
                $login_attempts++;
                $update_attempts_query = "UPDATE users SET login_attempts='$login_attempts', last_attempt=NOW() WHERE username='$username'";
                mysqli_query($con, $update_attempts_query);
                
                if ($login_attempts >= 3) {
                    echo '<p class="error-message">Too many login attempts. Please try again in 1 minute.</p>';
                } else {
                    echo '<p class="error-message">Invalid username or password.</p>';
                }
                
                echo '<p class="back-to-home">Login Here <a href="login.php">Login</a></p>';
            }
        }
    } else {
        echo '<p class="error-message">Username not found.</p>';
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

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
</body>
</html>