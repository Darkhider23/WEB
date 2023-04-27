<?php
session_start();
$conn = mysqli_connect("localhost", "root", "hospital", "games");
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM games";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="../styles.css" rel="stylesheet">
    <script src="jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Games</title>
</head>

<body>

    <?php
    require "../components/header.php";
    ?>

    <div class="games">
        <div class="search-bar">
            <form action="../pages/game_page.php" method="GET">
                <input type="text" placeholder="Search Games" name="query" autocomplete="off" />
                <div id="dropdown">
                    <ul class="result-list"></ul>
                </div>
            </form>
        </div>
        <div class="cardBx">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Access game data

                    $game_id = $row['id'];
                    $game_name = $row['game_name'];
                    $game_price = $row['game_price'];
                    $game_rating = $row['game_rating'];
                    $game_image = preg_replace("/[^a-zA-Z]/", "", $game_name);
                    $game_image = strtolower($game_image);
                    echo
                    '<div class="card" data-item="wish">';
                    echo '<a href="game_page.php?query=';
                    echo $game_name;
                    echo '">';
                    echo '<img src="../public/images/';
                    echo $game_image;
                    echo '.jpg" alt=""></a><div class="content"><h4>';
                    echo $game_name;
                    echo '</h4>';
                    echo '<div class="info"><p>Pricing<br><span>$';
                    echo $game_price;
                    echo '</span></p>';
                    echo '<div class="rating">';
                    echo $game_rating;
                    echo '<span class="star">&#9733;</span></div>';
                    echo '</div></div></div>';
                }
            }
            ?>
        </div>
    </div>

    <?php
    require "../components/footer.php";
    ?>
    <script>
        // get the input field and the result list
        const input = document.querySelector('input[name="query"]');
        const resultList = document.querySelector('.result-list');

        // listen for input changes and send AJAX request to get the results
        input.addEventListener('input', () => {
            const query = input.value.trim();
            if (query !== '') {
                // send AJAX request to get the search results
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `../search.php?query=${query}`, true);
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        const results = JSON.parse(xhr.responseText);
                        // if(jQuery.isEmptyObject(results))
                        // {
                        //     resultList.innerHTML = '';
                        //     const li = document.createElement('li');
                        //     li.innerText = 'No results';
                        // }
                            // display the results in the dropdown
                        resultList.innerHTML = '';
                        results.forEach(result => {
                            const li = document.createElement('li');
                            li.innerText = result.game_name;
                            li.addEventListener('click', () => {
                                input.value = result.game_name;
                                resultList.innerHTML = '';
                            });
                            resultList.appendChild(li);
                        });
                    }
                };
                xhr.send();
            } else {
                resultList.innerHTML = '';
            }
        });
    </script>
</body>

</html>