<?php
include("db.php");

if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user','$pass')");
    echo "<script>alert('Registered Successfully');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">
    <h2>Create Account 📝</h2>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Register</button>
    </form>

    <a href="index.php">Back to Login</a>
</div>

</body>
</html>