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
<body>
    <?php
    require "../components/header.php";
    ?>
    <div class="add-game-container">
        <div class="title">
            <h1>Add Games</h1>
        </div>
        <div class="search-bar">
            <form action="../forms/add_game_handler.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="game_name" placeholder="Game Name">
                <input type="number" name="game_price" placeholder="Game Price">
                <input type="number" name="game_rating" placeholder="Game Rating">
                <input type="text" name="game_description" placeholder="Game description">
                <input type="file" name="game_image">
                <div class="button-container">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    
    <div class="delete-game">
        <div class="title">
            <h1>Delete Game</h1>
        </div>
        <div class="search-bar">
            <form action="../forms/delete_game_handler.php" method="GET">
                <input type="text" placeholder="Game Name" name="query" autocomplete="off" />
                <div id="dropdown">
                    <ul class="result-list"></ul>
                </div>
            </form>
        </div>
    </div>

    <div class="update-game">
        <div class="title">
            <h1>Update Game</h1>
        </div>
        <div class="search-bar">
            <form action="../forms/update_game_handler.php" method="GET">
                <input type="text" placeholder="Game Name" name="query" autocomplete="off" />
                <div id="dropdown">
                    <ul class="result-list"></ul>
                </div>
                <input type="text" placeholder="Game Price" name="game_price">
                <input type="text" placeholder="Game Rating" name="game_rating">
                <input type="text" placeholder="Game Description" name="game_description">
                <div class="button-container">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script>
        // get the input field and the result list
        const input = document.querySelector('input[name="query"]');
        const resultList = document.querySelector('.result-list');
        // listen for input changes and send AJAX request to get the results
        input.addEventListener('input', () => {
            const query = input.value.trim();
            console.log(query);
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