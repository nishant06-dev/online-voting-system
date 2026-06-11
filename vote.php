<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}

// vote submit
if(isset($_POST['vote'])){
    $candidate = $_POST['candidate'];

    $sql = "UPDATE candidates SET votes = votes + 1 WHERE name='$candidate'";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Voting Result 📊</h2>

    <?php
    // fetch results
    $sql = "SELECT * FROM candidates ORDER BY votes DESC";
    $result = mysqli_query($conn, $sql);

    // get winner
    $winner = mysqli_fetch_assoc($result);

    // run again for full list
    $result = mysqli_query($conn, $sql);
    ?>

    <table border="1" width="100%" cellpadding="10">
        <tr>
            <th>Candidate</th>
            <th>Votes</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr <?php if($row['name'] == $winner['name']) echo "style='background:lightgreen;'"; ?>>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['votes']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <h3>🏆 Winner: <?php echo $winner['name']; ?></h3>

    <br><br>

    <!-- Logout Button -->
    <a href="logout.php">
        <button>Logout 🚪</button>
    </a>

</div>

</body>
</html>