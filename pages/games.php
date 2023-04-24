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

    <div class="games">
        <h2>Popular Games</h2>
        <ul>
            <li class="list"
                data-filter="all">All</li>
            <li class="list"
                data-filter="owned">Owned</li>
            <li class="list"
                data-filter="wish">WishList</li>
        </ul>
        <div class="cardBx">
            <div class="card"
                 data-item="owned">
                <img src="../public/images/game1.jpg"
                     alt="">
                <div class="content">
                    <h4>God of War</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>20$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="card"
                 data-item="wish">
                <img src="../public/images/game2.jpg"
                     alt="">
                <div class="content">
                    <h4>Red Dead Redemption</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>45$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="card"
                 data-item="owned">
                <img src="../public/images/game3.jpg"
                     alt="">
                <div class="content">
                    <h4>Hogwarts Legacy</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>20$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="card"
                 data-item="wish">
                <img src="../public/images/game4.jpg"
                     alt="">
                <div class="content">
                    <h4>Assassins Creed Valhalla</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>30$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="card"
                 data-item="owned">
                <img src="../public/images/game5.jpg"
                     alt="">
                <div class="content">
                    <h4>STAR WARS Jedi: Fallen Order</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>30$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
            </div>
            <div class="card"
                 data-item="wish">
                <img src="../public/images/game6.jpg"
                     alt="">
                <div class="content">
                    <h4>Ghost of Tsushima</h4>
                    <div class="progress-line"><span></span></div>
                    <div class="info">
                        <p>Pricing <br><span>30$</span></p>
                        <a href="#">Play Now</a>
                    </div>
                </div>
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