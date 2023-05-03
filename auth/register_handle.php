<?php

require '../utils/connect.php';

// Retrieve and sanitize user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Perform input validation, e.g., check if username and email are unique, password meets certain criteria, etc.

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert data into the database
$sql = "INSERT INTO users (name, email, password, role) VALUES ('$username', '$email', '$hashedPassword', 'user')";
if (mysqli_query($conn, $sql)) {
    // Registration successful, provide appropriate feedback to the user
    $response = array(
        'status' => 'success',
        'message' => 'Register successful!'
    );
} else {
    // Registration failed, provide appropriate feedback to the user
    $response = array(
        'status' => 'error',
        'message' => mysqli_error($conn)
    );
}
header('Content-Type: application/json');
echo json_encode($response);

// Close database connection
mysqli_close($conn);
