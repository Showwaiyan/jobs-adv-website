<?php
if (isset($_POST['login'])) {
    session_start();
    include('settings.php');

    $con = @mysqli_connect($host, $user, $pwd, $sql_db);
    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = mysqli_real_escape_string($con, $_POST['pass']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['username'] = $row['username'];
        header('Location: manage.php');
        exit;
    } else {
        echo '<p class="error-message">Invalid Username or Password.</p>';
        echo '<p class="back-to-home">Not an HR Manager? <a href="index.php">Go back to Home</a></p>';
    }
}
?>