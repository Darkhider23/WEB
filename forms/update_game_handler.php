<?php
// Connect to MySQL Database
require '../utils/connect.php';

$query = mysqli_real_escape_string($conn, $_GET['query']);

// Retrieve the Data to Update
$sql ="SELECT * from games where game_name ='$query'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Update the Data
if(isset($_GET['game_price'])&& isset($_GET['game_rating'])) {
    $price = $_GET['game_price'];
    $rating = $_GET['game_rating'];
    if(isset($_GET['game_description']))
    {
        $description = $_GET['game_description'];
    }
    else{
        $description="";
    }
    $query = "UPDATE games SET game_price='$price',game_rating='$rating', game_description='$description' WHERE game_name='$query'";
    if(mysqli_query($conn, $query)){
        echo "Data updated successfully!";
    }
    else{
        echo "Error". mysqli_error($conn);
    }
    
}
?>
