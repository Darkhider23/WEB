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

<body>
    <div class="add-game-container">
        <form action="../add_game_handler.php" class="add-game-form" method="POST"  enctype="multipart/form-data">
            <input type="text" name="game_name" placeholder="Game Name">
            <input type="number" name="game_price" placeholder="Game Price">
            <input type="number" name="game_rating" placeholder="Game Rating">
            <textarea placeholder="Game description"></textarea>
            <input type="file" name="game_image">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>