<?php
include_once ("../settings/connection.php");
include_once ("../settings/core.php");

function getTotalBookings(){
    global $conn;
    $userId = userIdExist();
    $total_bookings_query = "SELECT Count(*) from Bookings where Bookings.pid = $userId;";
    // echo $total_bookings_query;
    // exit();
    $total_bookings = mysqli_query($conn, $total_bookings_query);
    if ($total_bookings) {
        $total_bookings_count = mysqli_fetch_column($total_bookings, );
        return $total_bookings_count;
    } else {
        return 0;
    }
}

// echo getNumberOfCancelledBookings();