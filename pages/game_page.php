
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', 'hospital', 'games');

// get the name of the game from the URL parameters
$name = mysqli_real_escape_string($conn, $_GET['query']);

// query the database for the details of the game
$result = mysqli_query($conn, "SELECT * FROM games WHERE game_name='$name'");

// display the details of the game
$row = mysqli_fetch_assoc($result);
echo '<h1>' . $row['game_name'] . '</h1>';
echo '<p>' . $row['game_price'] . '</p>';

// close the database connection
mysqli_close($conn);?>
</body>
</html>