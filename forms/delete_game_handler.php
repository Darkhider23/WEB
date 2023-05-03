<?php
require '../utils/connect.php';

// Delete row from table
$query = mysqli_real_escape_string($conn, $_GET['query']);

// query the database for the search results
$sql ="SELECT * from games where game_name ='$query'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sql="DELETE FROM games where game_name ='$query'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    $fileName = preg_replace("/[^a-zA-Z]/", "", $row['game_name']);
    $fileName = strtolower($fileName);
    $fileName = '../public/images/'.$fileName . '.'.$row['image_type'];
    if(file_exists($fileName)){
        unlink($fileName);
    }
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
