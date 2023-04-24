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
    <title>Document</title>
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

    <script>
        /* Sticky Navbar */
        window.addEventListener('scroll', function () {
            var header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });

        /* Responsive Navbar */

        function toggleMenu(){
            const toggleMenu = document.querySelector('.toggleMenu');
            const nav = document.querySelector('.nav');
            toggleMenu.classList.toggle('active');
            nav.classList.toggle('active');
        }

        /* Fiter Card */

        let list = document.querySelectorAll('.list');
        let card = document.querySelectorAll('.card');

        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener('click', function () {
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