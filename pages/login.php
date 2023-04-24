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
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
    require "../components/header.php";
    ?>

    <div class="login-container">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form id="register-form">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="signup-username" id="signup-username" placeholder="User name" required="">
                    <input type="email" name="signup-email" id="signup-email" placeholder="Email" required="">
                    <input type="password" name="signup-password" id="signup-password" placeholder="Password" required="">
                    <button type="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form id="login-form">
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="login-email" id="login-email" placeholder="Email" required="">
                    <input type="password" id="login-password" name="login-password" placeholder="Password" required="">
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <div class="popup-container" id="popup-container">
        <div id="popup-message" class="popup-message"></div>
    </div>

    <?php
    require "../components/footer.php";
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

        function showPopup(message) {
            var popupContainer = document.getElementById('popup-container');
            var popupMessage = document.getElementById('popup-message-text');
            popupMessage.textContent = message;
            popupContainer.style.display = 'flex';
        }

        function hidePopup() {
            var popupContainer = document.getElementById('popup-container');
            popupContainer.style.display = 'none';
        }


        // Add event listener to login form submission
        document.getElementById("login-form").addEventListener("submit", function(event) {
            event.preventDefault();

            // Get email and password inputs from form
            var email = document.getElementById("login-email").value;
            var password = document.getElementById("login-password").value;
            // Make AJAX request to login.php with form data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../process.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Parse JSON response
                    var response = JSON.parse(xhr.responseText);

                    // Update popup message with response message
                    var popupMessage = document.getElementById("popup-message");
                    popupMessage.textContent = response.message;

                    // Show custom popup
                    var popup = document.getElementById("popup-container");
                    popup.style.display = "flex";

                    // Hide popup after 3 seconds
                    setTimeout(function() {
                        popup.style.display = "none";
                        window.location.href = 'index.php';
                    }, 1500);
                }
            };
            xhr.send("email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
        });


        // Add event listener to resgiter form submission
        document.getElementById("register-form").addEventListener("submit", function(event) {
            event.preventDefault();

            // Get name email and password inputs from form
            var name = document.getElementById("signup-username").value;
            var email = document.getElementById("signup-email").value;
            var password = document.getElementById("signup-password").value;
            // Make AJAX request to login.php with form data
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../register_handle.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Parse JSON response
                    var response = JSON.parse(xhr.responseText);

                    // Update popup message with response message
                    var popupMessage = document.getElementById("popup-message");
                    popupMessage.textContent = response.message;

                    // Show custom popup
                    var popup = document.getElementById("popup-container");
                    popup.style.display = "flex";

                    // Hide popup after 3 seconds
                    setTimeout(function() {
                        popup.style.display = "none";
                        window.location.href = 'index.php';
                    }, 1500);
                }
            };
            xhr.send("username=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
        });
    </script>
</body>

</html>