<?php
include_once("../settings/connection.php");

// SQL query to retrieve all drivers
$query = "SELECT CONCAT(fname,' ', lname) as fullname, Driver.pid FROM Driver JOIN People ON People.pid = Driver.pid;";

// echo $query;
// exit();

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if ($result) {
    // Fetch associative array of the result rows
    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
foreach ($results as $row) {
    echo "<option value='{$row['pid']}'>{$row['fullname']}</option>";
}
// echo "yes";