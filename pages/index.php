<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="../styles.css" rel="stylesheet">
    <title>Game Library</title>
</head>

<body>

    <?php
    require '../utils/connect.php';
    require "../components/header.php";
    ?>
    <!-- Home Section-->
    <div class="banner">
        <div class="bg">
            <div class="content">
                <h2>A new home for <br>Gamers</h2>
                <p>Nothing is true, everything is permitted. </p>
                <a href="./login.html" class="btn">Join now</a>
            </div>
            <img src="../public/images/edward2.png">
        </div>
    </div>
    <?php
    require "../components/footer.php"
    ?>
</body>

</html>