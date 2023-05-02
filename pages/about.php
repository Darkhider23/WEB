<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
          rel='stylesheet'>
    <link href="../styles.css"
          rel="stylesheet">
    <title>About</title>
</head>
<body>
    
<?php
    require "../components/header.php";
    ?>

    <div class="about">
        <div class="contentBx">
            <h2>About Us</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum facilis veniam suscipit impedit,
                numquam ratione officia eos minima quidem deleniti ipsa ducimus incidunt atque corporis.</p>
            <a href="#">Read More</a>
        </div>
        <img src="../public/images/tlou.png">
    </div>

    <?php
    require "../components/footer.php";
    ?>
</body>
</html>