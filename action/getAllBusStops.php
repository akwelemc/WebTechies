<?php

include("../settings/connection.php");
// include("../settings/core.php");

// Fetch all buses from the database
$sql = "SELECT * , `route` FROM BusStop JOIN Routes ON Routes.route_id = BusStop.route_id";
$result = $conn->query($sql);

// Check if there are any buses in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["bsid"] . "</td>";
        echo "<td>" . $row["routeDescription"] . "</td>";
        echo "<td>" . $row["stopName"] . "</td>";
        echo "<td>" . $row["route"] . "</td>";
        echo "<td><a href='../admin/edit_busStop.php?bsid=" . $row["bsid"] . "'>Edit</a> | <a href='../action/delete_busStop.php?bsid=" . $row["bsid"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No buses found</td></tr>";
}