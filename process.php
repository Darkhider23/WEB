<?php
// Start the session
session_start();

// Establish database connection
$conn = mysqli_connect("localhost", "root", "hospital", "games");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve and sanitize user input
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database to retrieve user data
$sql = "SELECT * FROM user WHERE email = '$email'";
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
        $_SESSION['user_id'] = $row['iduser'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['role'] = 'user';
        
        // echo "Login Successful";
    } else {
        // Password does not match

        $response = array(
            'status' => 'error',
            'message' => 'Login failed. Invalid Password.'
        );
    }
} else {

    // Email not found
    $response = array(
        'status' => 'error',
        'message' => 'Login failed. Invalid Email.'
    );
}
header('Content-Type: application/json');
echo json_encode($response);
// echo json_encode(array('response' => $response));
// Close database connection
mysqli_close($conn);
