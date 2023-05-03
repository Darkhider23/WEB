<?php
if (isset($_POST['submit'])) {
    require '../utils/connect.php';
    // Get the uploaded file information
    $fileTmpName = $_FILES['game_image']['tmp_name'];
    $fileSize = $_FILES['game_image']['size'];
    $fileError = $_FILES['game_image']['error'];
    $fileType = $_FILES['game_image']['type'];
    $image_fileType = substr($fileType, 6, strlen($fileType));
    $game_name = mysqli_real_escape_string($conn, $_POST['game_name']);
    $fileName = preg_replace("/[^a-zA-Z]/", "", $game_name);
    $fileName = strtolower($fileName);
    // Do some basic validation
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (in_array($fileType, $allowedTypes)) {
        // Move the uploaded file to a new location
        $uploadDir = '../public/images/';
        $targetFile = $uploadDir . basename($fileName) . '.' . basename($fileType);
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            echo 'File uploaded successfully.<br>';
            $game_name = mysqli_real_escape_string($conn, $_POST['game_name']);
            $game_price = mysqli_real_escape_string($conn, $_POST['game_price']);
            $game_rating = mysqli_real_escape_string($conn, $_POST['game_rating']);
            $game_description = mysqli_real_escape_string($conn, $_POST['game_description']);
            $sql = "INSERT INTO games (game_name,game_price,game_rating,game_description,image_type) values('$game_name','$game_price','$game_rating','$game_description','$image_fileType')";
            if (mysqli_query($conn, $sql)) {
                echo "Game added <br>";
            } else {
                echo "Error:" . mysqli_error($conn).'<br>';
            }
        } else {
            echo 'Error uploading file.<br>';
        }
    } else {
        echo 'Invalid file type.<br>';
    }
}
