<?php
include_once("../settings/connection.php");

// SQL query to retrieve all drivers
$query = "SELECT bid, busName FROM Bus";;

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch associative array of the result rows
    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
foreach ($results as $row) {
    echo "<option value='{$row['bid']}'>{$row['busName']}</option>";
}
// echo "yes";