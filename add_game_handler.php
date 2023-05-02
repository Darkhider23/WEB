<?php
if (isset($_POST['submit'])) {
    require './connect.php';
    // Get the uploaded file information
    $fileName = $_FILES['game_image']['name'];
    $fileTmpName = $_FILES['game_image']['tmp_name'];
    $fileSize = $_FILES['game_image']['size'];
    $fileError = $_FILES['game_image']['error'];
    $fileType = $_FILES['game_image']['type'];
    $game_name = mysqli_real__escape_string($conn,$_POST['game_name']);
    echo $fileName;
    // Do some basic validation
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (in_array($fileType, $allowedTypes)) {
        // Move the uploaded file to a new location
        $uploadDir = './public/images/';
        $targetFile = $uploadDir . basename($fileName);
        if (move_uploaded_file($fileTmpName, $targetFile)) {
            echo 'File uploaded successfully.';
            $game_name = mysqli_real__escape_string($conn,$_POST['game_name']);
            $game_name = mysqli_real__escape_string($conn,$_POST['game_name']);
            $game_name = mysqli_real__escape_string($conn,$_POST['game_name']);
            $game_name = mysqli_real__escape_string($conn,$_POST['game_name']);

        } else {
            echo 'Error uploading file.';
        }
    } else {
        echo 'Invalid file type.';
    }


}

?>