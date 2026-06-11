<?php
session_start();
include("db.php");

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

$user = $_SESSION['user'];

$userData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE username='$user'"));

if ($userData['voted'] == 1) {
    echo "<h2 style='color:white;'>You already voted!</h2>";
    exit();
}

$candidates = mysqli_query($conn, "SELECT * FROM candidates");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vote</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="login-container">
    <h2>Vote Now 🗳️</h2>

    <form action="vote.php" method="post">
        <?php while($row = mysqli_fetch_assoc($candidates)) { ?>
            <input type="radio" name="candidate" value="<?php echo $row['id']; ?>" required>
            <?php echo $row['name']; ?><br><br>
        <?php } ?>

        <button type="submit">Submit Vote</button>
    </form>
</div>

</body>
</html>