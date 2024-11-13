<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST['login'])) {
    session_start();
    include('settings.php');

    $con = @mysqli_connect($host, $user, $pwd, $sql_db);
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);
    

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $q2 = "UPDATE users set last_attempt = now() where username='$username'";
    $result = mysqli_query($con, $query);
    mysqli_query($con, $q2);
    if ($result and mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('Location: manage.php');
    } else {
        echo '<p class="error-message">Invalid Username or Password.</p>';
        echo '<p class="back-to-home">Not an HR Manager? <a href="index.php">Go back to Home</a></p>';
    }
}
?>
</body>
</html>