<?php
$username_header = $_SESSION['username'];
?>
<header>
    <a href="./index.php"
       class="logo">Games Haven</a>
    <ul class="nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./about.php">About</a></li>
        <?php
        if(isset($_SESSION['role']) == 'user')
        {
            echo '<li><a href="./games.php">My Games</a></li>';
        }

        if(isset($_SESSION['username'])){
            echo '<li><a href="../logout.php">Logout</a></li>';
        }
        else{
            
            echo '<li><a href="./login.php">Login</a></li>';
        }
        ?>
        <li><a href="./contact.php">Contact</a></li>
    </ul>
    <div class="action">
        <div class="searchBx">
            <a href="#"><i class='bx bx-search'></i></a>
            <input type="text"
                   placeholder="Search Games" />
        </div>
    </div>
    <div class="header-username">
        <?php
        echo $username_header;
        ?>
    </div>
    <div class="toggleMenu" onclick="toggleMenu();"></div>
</header>