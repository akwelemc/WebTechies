<?php
include('../settings/connection.php');

session_start();

if (!isset($_SESSION['user_id'])) {
   
    header("Location: login.php");
    exit(); 
}

$userID = $_SESSION['user_id'];

// SQL query
$sql = "SELECT Bookings.bookingId, Bus.bid, TimeSlots.time, Bookings.date_booked, BusStop.stopName, CONCAT(People.fname, ' ', People.lname) AS fullName, People.telnumber
        FROM Bookings
        JOIN TimeSlots ON TimeSlots.slotID = Bookings.time_slotID
        JOIN BusStop ON BusStop.bsid = Bookings.busStopID
        JOIN Bus ON Bus.bid = Bookings.bid
        JOIN Driver On Driver.bid = Bookings.bid
        JOIN People ON People.pid = Bookings.pid
        WHERE Driver.pid = $userID";

$results = $conn->query($sql);

if ($results === false) {
    
    echo "Error: " . $conn->error;
} else {
 
    if ($results->num_rows > 0) {
    
        while ($row = $results->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['fullName'] . '</td>';
            echo '<td>' . $row['telnumber'] . '</td>';
            echo '<td>' . $row['stopName'] . '</td>';
            echo '<td>' . $row['date_booked'] . '</td>';
            echo '<td>'. $row['time'].'</td>';
            echo '</tr>';
        }
    } else {
        
        echo '<tr><td colspan="4">No bookings found for the user.</td></tr>';
    }
}


$conn->close();
