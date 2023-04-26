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
    <title>Document</title>
</head>

<body><?php
        require('../components/header.php');
        ?>
    <div class="gamepage-container">
        <div class="bg">
            <?php
            // connect to the database
            $conn = mysqli_connect('localhost', 'root', 'hospital', 'games');

            // get the name of the game from the URL parameters
            $name = mysqli_real_escape_string($conn, $_GET['query']);

            // query the database for the details of the game
            $result = mysqli_query($conn, "SELECT * FROM games WHERE game_name='$name'");

            // display the details of the game
            $row = mysqli_fetch_assoc($result);
            $game_image = preg_replace("/[^a-zA-Z]/", "", $row['game_name']);
            $game_image = strtolower($game_image);
            echo '<div class="title"><h1 id="title">' . $row['game_name'] . '</h1></div><div class="content"><p>' . $row['description'] . '</p>';
            echo '<div class="image">
                <img src="../public/images/' . $game_image . '.jpg" alt=""></div>';
            echo '';

            // close the database connection
            mysqli_close($conn); ?>
            <div class="button-bg">
                <div class="buttons-container">
                    <button class="button-arounder">Add to my wishlist</button>
                </div>
            </div>
        </div>
        <?php
        require('../components/footer.php');
        ?>
    </div>

    <script>
        $(document).ready(function() {
  var fontSize = 50; // set initial font size
  var divWidth = $('#title').width(); // get width of the div
  var textWidth = $('#title').textWidth(); // get width of the text
  while (textWidth> divWidth) { // while the text is wider than the div
    fontSize--; // decrease font size
    $('#title').css('font-size', fontSize + 'px'); // set new font size
    textWidth = $('#title').textWidth(); // recalculate text width
  }
});

// function to calculate the width of the text
$.fn.textWidth = function() {
  var html = '<span style="display:none">' + $(this).text() + '</span>';
  $('body').append(html);
  var width = $('body').find('span:last').width();
  $('body').find('span:last').remove();
  return width;
}
    </script>

</body>

</html>