<?php
session_start();
// if(isset($_POST['submit'])) {
//     // Collect form data
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $message = $_POST['message'];

//     // Set recipient email address
//     $to = "farchicoding@gmail.com";

//     // Set email subject
//     $subject = "New contact form submission from $name";

//     // Set email headers
//     $headers = "From: $email\r\n";
//     $headers .= "Reply-To: $email\r\n";
//     $headers .= "Content-Type: text/html\r\n";

//     // Compose email message
//     $email_message = "<html><body>";
//     $email_message .= "<h1>New Contact Form Submission</h1>";
//     $email_message .= "<p><strong>Name:</strong> $name</p>";
//     $email_message .= "<p><strong>Email:</strong> $email</p>";
//     $email_message .= "<p><strong>Message:</strong><br>$message</p>";
//     $email_message .= "</body></html>";

//     // Send email
//     if(mail($to, $subject, $email_message, $headers)) {
//         // Email sent successfully
//         echo "<script>alert('Email sent!');</script>";

//     } else {
//         // Email failed to send
//         echo "<script>alert('Error sending email');</script>";

//     }
// }
?>
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
    <title>Contact</title>
</head>
<body>

<?php
    require "../components/header.php";
    ?>

    <div class="contact">
        <div class="form">
            <h1>Contact Us</h1>
            <form action ="../forms/contact_handler.php" method="POST">
            <div class="inputBx">
                <p>Enter Name</p>
                <input type="text" placeholder="Full Name" name="name">
            </div>
            <div class="inputBx">
                <p>Enter Email</p>
                <input type="text" placeholder="Email" name="email">
            </div>
            <div class="inputBx">
                <p>Message</p>
                <textarea placeholder="Type here..." name="message"></textarea>
            </div>
            <div class="inputBx">
                <input type="submit" name="submit">
            </div>
            </form>
        </div>
    </div>

    <?php
    require "../components/footer.php";
    ?>
</body>
</html>