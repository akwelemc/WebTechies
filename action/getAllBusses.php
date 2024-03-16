<?php

include("../settings/connection.php");
// include("../settings/core.php");

// Fetch all buses from the database
$sql = "SELECT * , `route` FROM Bus JOIN Routes ON Routes.route_id = Bus.route_id";
$result = $conn->query($sql);

// Check if there are any buses in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["busName"] . "</td>";
        echo "<td>" . $row["capacity"] . "</td>";
        echo "<td>" . $row["registrationNumber"] . "</td>";
        echo "<td>" . $row["route"] . "</td>";
        echo "<td><a href='../admin/edit_bus.php?bid=" . $row["bid"] . "'>Edit</a> | <a href='../action/delete_bus.php?bid=" . $row["bid"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No buses found</td></tr>";
}