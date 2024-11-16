<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $current_time = time() + (8*60*60);
        
        // Check if the user is in timeout
        if ($login_attempts >= 3 && ($current_time - $last_attempt_time) < 60) {
            $_SESSION['error_message'] = "You enter wrong password 3 times. Please try again in 1 minute.";
            header('Location: login.php');
            exit();
        } else {
            // Reset login attempts after 1 minute if timeout has passed
            if ($login_attempts >= 3 && ($current_time - $last_attempt_time) >= 60) {
                $login_attempts = 0;
            }

            // Query to check the user
            $query = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Verify the password
                if ($hashed_password == $row['password']) {
                    // Successful login
                    $_SESSION['username'] = $row['username'];

                    // Reset login attempts
                    
                    $reset_query = "UPDATE users SET login_attempts=0, last_attempt=NOW() WHERE username='$username'";
                    mysqli_query($con, $reset_query);

                    header('Location: manage.php');
                    exit();
                } else {
                    // Increment failed attempts
                    $login_attempts = $row['login_attempts'] + 1;
                    $update_attempts_query = "UPDATE users SET login_attempts='$login_attempts', last_attempt=NOW() WHERE username='$username'";
                    mysqli_query($con, $update_attempts_query);

                    // Handle lockout after 3 attempts
                    if ($login_attempts >= 3) {
                        $_SESSION['error_message'] = "Too many failed attempts. Please try again in 1 minute.";
                        header('Location: login.php');
                        exit();
                    } else {
                        $_SESSION['error_message'] = "Invalid username or password.";
                        header('Location: login.php');
                        exit();
                    }
                }
            } else {
                // User not found

                $_SESSION['error_message'] = "User not exists.";
                header('Location: login.php');
                // echo $query;
                exit();
            }
        }
    } else {
        $_SESSION['error_message'] = "User not found.";
        header('Location: login.php');
        exit();
    }
}

if (isset($_POST['signup'])) {
    session_start();
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    $confpass = mysqli_real_escape_string($con, $_POST['confpass']);
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    if ($result and mysqli_num_rows($result) > 0) {
        $_SESSION['error_message'] = "Username already exists.";
        header('Location: register.php');
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
                $_SESSION['error_message'] = "Error creating account.";
                header('Location: register.php');
            }
        } else {
            $_SESSION['error_message'] = "Password does not match.";
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