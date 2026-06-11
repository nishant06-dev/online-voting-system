<?php
session_start();
include("db.php");

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>

<div class="login-container">
    <h2>Welcome Back 👋</h2>
    <p>Login to your account</p>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <a href="register.php">Register here</a>
</div>

</body>
</html>