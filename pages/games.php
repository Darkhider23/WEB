<?php
session_start();
$conn = mysqli_connect("localhost", "root", "hospital", "games");
$user_id = $_SESSION['user_id'];

//owned list
$query = "SELECT games.* FROM games
INNER JOIN owned ON games.id = owned.game_id
WHERE owned.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

//wishlist
$query = "SELECT games.* FROM games
INNER JOIN wishlist ON games.id = wishlist.game_id
WHERE wishlist.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result1 = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="../styles.css" rel="stylesheet">
    <title>My Games</title>
</head>

<body>

    <?php
    require "../components/header.php";
    ?>

    <div class="games">
        <h2>Popular Games</h2>
        <ul>
            <li class="list" data-filter="all">All</li>
            <li class="list" data-filter="owned">Owned</li>
            <li class="list" data-filter="wish">WishList</li>
        </ul>
        <div class="cardBx">
            <?php
            while ($row = $result->fetch_assoc()) {
                // Access game data
                $game_id = $row['id'];
                $game_name = $row['game_name'];
                $game_price = $row['game_price'];
                $game_rating = $row['game_rating'];
                $game_image = preg_replace("/[^a-zA-Z]/", "", $game_name);
                $game_image = strtolower($game_image);
                echo
                '<div class="card" data-item="owned">';
                echo '<img src="../public/images/';
                echo $game_image;
                echo '.jpg" alt=""><div class="content"><h4>';
                echo $game_name;
                echo '</h4>';
                echo '<div class="info"><p>Pricing<br><span>$';
                echo $game_price;
                echo '</span></p>';
                echo'<div class="rating">';
                echo $game_rating;
                echo '<span class="star">&#9733;</span></div>';
                echo '</div></div></div>';
            }
            while ($row = $result1->fetch_assoc()) {
                // Access game data
                $game_id = $row['id'];
                $game_name = $row['game_name'];
                $game_price = $row['game_price'];
                $game_rating = $row['game_rating'];
                $game_image = preg_replace("/[^a-zA-Z]/", "", $game_name);
                $game_image = strtolower($game_image);
                echo
                '<div class="card" data-item="wish">';
                echo '<img src="../public/images/';
                echo $game_image;
                echo '.jpg" alt=""><div class="content"><h4>';
                echo $game_name;
                echo '</h4>';
                echo '<div class="info"><p>Pricing<br><span>$';
                echo $game_price;
                echo '</span></p>';
                echo'<div class="rating">';
                echo $game_rating;
                echo '<span class="star">&#9733;</span></div>';
                echo '</div></div></div>';
            }
            ?>
    </div>
    <?php
    require "../components/footer.php";
    ?>

    <script>

        /* Fiter Card */

        let list = document.querySelectorAll('.list');
        let card = document.querySelectorAll('.card');

        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener('click', function() {
                for (let j = 0; j < list.length; j++) {
                    list[j].classList.remove('active');
                }

                this.classList.add('active');

                let dataFilter = this.getAttribute('data-filter');

                for (let k = 0; k < card.length; k++) {
                    card[k].classList.remove('active');
                    card[k].classList.add('hide');

                    if (card[k].getAttribute('data-item') == dataFilter || dataFilter == 'all') {
                        card[k].classList.remove('hide');
                        card[k].classList.add('active');
                    }
                }
            })
        }
    </script>
</body>

</html>