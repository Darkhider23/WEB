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
    <title>Contact</title>
</head>
<body>

<?php
    require "../components/header.php";
    ?>

    <div class="contact">
        <div class="form">
            <h1>Contact Us</h1>
            <div class="inputBx">
                <p>Enter Name</p>
                <input type="text" placeholder="Full Name">
            </div>
            <div class="inputBx">
                <p>Enter Email</p>
                <input type="text" placeholder="Email">
            </div>
            <div class="inputBx">
                <p>Message</p>
                <textarea placeholder="Type here..."></textarea>
            </div>
            <div class="inputBx">
                <input type="submit" name="Submit">
            </div>
        </div>
    </div>

    <?php
    require "../components/footer.php";
    ?>
</body>
</html>