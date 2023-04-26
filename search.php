<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', 'hospital', 'games');

// get the search query from the URL parameters
$query = mysqli_real_escape_string($conn, $_GET['query']);

// query the database for the search results
$result = mysqli_query($conn, "SELECT * FROM games WHERE game_name LIKE '%$query%' LIMIT 10");

// format the results as JSON and return them
$results = [];
while ($row = mysqli_fetch_assoc($result)) {
  $results[] = $row;
}
echo json_encode($results);