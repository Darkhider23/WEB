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
    require_once "../connect.php";
    require "../components/header.php";
    ?>
    <!-- Home Section-->
    <div class="banner">
        <div class="bg">
            <div class="content">
                <h2>A new home for <br>Gamers</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni at, ad aliquam. </p>
                <a href="./login.html" class="btn">Join now</a>
            </div>
            <img src="../public/images/assassin.png">
        </div>
    </div>
    <?php
    require "../components/footer.php"
    ?>

    <script>
        /* Sticky Navbar */
        window.addEventListener('scroll', function() {
            var header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        /* Responsive Navbar */

        function toggleMenu() {
            const toggleMenu = document.querySelector('.toggleMenu');
            const nav = document.querySelector('.nav');
            toggleMenu.classList.toggle('active');
            nav.classList.toggle('active');
        }

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