<?php
if(isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set recipient email address
    $to = "farchicoding@gmail.com";

    // Set email subject
    $subject = "New contact form submission from $name";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html\r\n";

    // Compose email message
    $email_message = "<html><body>";
    $email_message .= "<h1>New Contact Form Submission</h1>";
    $email_message .= "<p><strong>Name:</strong> $name</p>";
    $email_message .= "<p><strong>Email:</strong> $email</p>";
    $email_message .= "<p><strong>Message:</strong><br>$message</p>";
    $email_message .= "</body></html>";

    // Send email
    if(mail($to, $subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Email sent successfully";
    } else {
        // Email failed to send
        echo "Failed to send email";
    }
}
?>
