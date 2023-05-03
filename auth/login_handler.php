<?php
// Start the session
session_start();
require '../utils/connect.php';

// Retrieve and sanitize user input
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database to retrieve user data
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

// Check for a match
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Compare hashed password
    if (password_verify($password, $row['password'])) {
        // Redirect to dashboard or other protected page
        $response = array(
            'status' => 'success',
            'message' => 'Login successful!'
        );
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['role'] = $row['role'];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;

    } else {
        // Password does not match

        $response = array(
            'status' => 'error',
            'message' => 'Login failed. Invalid Password.'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
} else {

    // Email not found
    $response = array(
        'status' => 'error',
        'message' => 'Login failed. Invalid Email.'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
// echo json_encode(array('response' => $response));
// Close database connection
mysqli_close($conn);