<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "hospital";
$dbname = "games";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if(!$conn){
    die("Connection failed" + $conn->connect_error);
}
