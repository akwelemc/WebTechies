<?php

include("../settings/connection.php");
// include("../settings/core.php");

// Fetch all buses from the database
$sql = "SELECT CONCAT(People.fname, ' ', People.lname) AS fullname, People.dob, People.email, People.telnumber
FROM People
LEFT JOIN Driver ON Driver.pid = People.pid
WHERE Driver.pid IS NULL;
";
$result = $conn->query($sql);

// echo $sql;
// exit();

// Check if there are any buses in the result
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "<td>" . $row["telnumber"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
    }
} else {
    echo "<tr><td colspan='5'>No user found</td></tr>";
}