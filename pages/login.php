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
    <title>Login</title>
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
                    <div class="username-container">
                        <input type="text" name="signup-username" id="signup-username" placeholder="User name">
                        <span id="signup-usernameError" class="error"></span>
                    </div>
                    <div class="email-container">
                        <input type="email" name="signup-email" id="signup-email" placeholder="Email">
                        <span id="signup-emailError" class="error"></span>
                    </div>
                    <div class="password-container">
                        <input type="password" name="signup-password" id="signup-password" placeholder="Password">
                        <span id="signup-passwordError" class="error"></span>
                    </div>
                    <button type="submit">Sign up</button>
                </form>
            </div>

            <div class="login">
                <form id="login-form">
                    <label for="chk" aria-hidden="true">Login</label>
                    <div class="email-container">
                        <input type="email" name="login-email" id="login-email" placeholder="Email">
                        <span id="login-emailError" class="error"></span>
                    </div>
                    <div class="password-container">
                        <input type="password" id="login-password" name="login-password" placeholder="Password">
                        <span id="login-passwordError" class="error"></span>
                    </div>

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
        document.getElementById("login-form").addEventListener("submit", function (event) {
            document.getElementById("login-emailError").innerHTML = "";
            document.getElementById("login-passwordError").innerHTML = "";
            event.preventDefault();

            // Get email and password inputs from form
            var email = document.getElementById("login-email").value;
            var password = document.getElementById("login-password").value;

            var email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
            var password_regex = /^(?=.*\d).{8,}$/

            var doesErrorExist = false;
            // Display error symbols next to empty fields
            if (!email_regex.test(email)) {
                document.getElementById("login-emailError").innerHTML = "&#x274C;";
                doesErrorExist = true;
            }
            if (!password_regex.test(password)) {
                document.getElementById("login-passwordError").innerHTML = "&#x274C;";
                doesErrorExist = true;
            }

            if (!doesErrorExist) {
                // Make AJAX request to login.php with form data
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../auth/login_handler.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        // Parse JSON response
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);
                        // Update popup message with response message
                        var popupMessage = document.getElementById("popup-message");
                        popupMessage.textContent = response.message;

                        // Show custom popup
                        var popup = document.getElementById("popup-container");
                        popup.style.display = "flex";

                        // Hide popup after 3 seconds
                        setTimeout(function () {
                            if (response.status == "success") {

                                window.location.href = 'index.php';

                            }
                            popup.style.display = "none";
                        }, 1500);
                    }
                };
                xhr.send("email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
            }

        });


        // Add event listener to resgiter form submission
        document.getElementById("register-form").addEventListener("submit", function (event) {
            event.preventDefault();

            document.getElementById("signup-usernameError").innerHTML = "";
            document.getElementById("signup-emailError").innerHTML = "";
            document.getElementById("signup-passwordError").innerHTML = "";

            // Get name email and password inputs from form
            var name = document.getElementById("signup-username").value;
            var email = document.getElementById("signup-email").value;
            var password = document.getElementById("signup-password").value;


            var email_regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
            var password_regex = /^(?=.*\d).{8,}$/
            var username_regex = /^(?=.*[A-Z]).{4,}$/
            var doesErrorExist = false;
            // Display error symbols next to empty fields
            if (!username_regex.test(name)) {
                document.getElementById("signup-usernameError").innerHTML = "&#x274C;";
                doesErrorExist = true;
            }
            if (!email_regex.test(email)) {
                document.getElementById("signup-emailError").innerHTML = "&#x274C;";
                doesErrorExist = true;
            }
            if (!password_regex.test(password)) {
                document.getElementById("signup-passwordError").innerHTML = "&#x274C;";
                doesErrorExist = true;
            }
            if (!doesErrorExist) {
                // Make AJAX request to login.php with form data
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../auth/register_handle.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
                xhr.onreadystatechange = function () {
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
                        setTimeout(function () {
                            if (response.status == "success") {
                                window.location.href = 'index.php';
                            }
                            popup.style.display = "none";

                        }, 1500);
                    }
                };
                xhr.send("username=" + encodeURIComponent(name) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password));
            }
        });
    </script>
</body>

</html>