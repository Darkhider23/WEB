<?php
$username_header = $_SESSION['username'];
?>
<header>
    <a href="./index.php" class="logo">Games Haven</a>
    <ul class="nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./ourgames.php">Games</a></li>
        <?php
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'user') {
            echo '<li><a href="./games.php">My Games</a></li>';
        }
        ?>
        <li><a href="./contact.php">Contact</a></li>
        <li><a href="./about.php">About</a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li><a href="../auth/logout.php">Logout</a></li>';
        } else {

            echo '<li><a href="./login.php">Login</a></li>';
        }
        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            echo '<li><a href="./adminpage.php">Admin</a></li>';
        }
        ?>
    </ul>
    <div class="header-username">
        <?php
        echo $username_header;
        ?>
    </div>
    <div class="toggleMenu" onclick="toggleMenu();"></div>
</header>

<script>
    /* Sticky Navbar */
    window.addEventListener('scroll', function () {
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

</script>