
<?php
include('../settings/connection.php');


// Function to calculate total number of bookings for the day
function getTotalBookingCountForDay() {
    global $conn;
    
    // Get the current date
    $date = date('Y-m-d');
    
    $sql = "SELECT COUNT(*) AS totalBookings FROM Bookings WHERE date_booked = '$date'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['totalBookings'];
}

// // Function to calculate total number of deleted rides
// function getTotalDeletedRides() {
//     global $conn;
//     $sql = "SELECT COUNT(*) AS totalDeletedRides FROM DeleteTable";
//     $result = $conn->query($sql);
//     $row = $result->fetch_assoc();
//     return $row['totalDeletedRides'];
// }
// ?>
