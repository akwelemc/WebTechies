<?php
// Include your database connection file
include_once '../settings/connection.php';
include_once '../settings/core.php';

userIdExist();
// Initialize an array to store the driver information
$driverInfo = array();

// SQL query to fetch driver information
$sql = "SELECT CONCAT(fname,' ', lname) AS fullname, email, telnumber, Driver.licenseNumber, Driver.bid 
            FROM People 
            JOIN Driver ON Driver.pid = People.pid 
            WHERE People.pid IN (SELECT pid FROM Driver)";

// Execute the query
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Loop through each row and fetch driver details
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["licenseNumber"] . "</td>";
        echo "<td>" . $row["telnumber"] . "</td>";
        echo "<td>" . $row["bid"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No buses found</td></tr>";
}

// Close the database connection
$conn->close();






