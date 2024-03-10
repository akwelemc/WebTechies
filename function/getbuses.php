<?php
include "../settings/connection.php"; 




$sql = "SELECT * FROM bus";
$result = $conn->query($sql);

$buses = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Store both bus name and corresponding bid in an associative array
        $buses[$row["bid"]] = $row["busName"];
    }
}

$conn->close();
?>

