<?php
include_once("../settings/connection.php");
include_once("../settings/core.php");

function getNumberOfCancelledBookings()
{
    global $conn;
    $userId = userIdExist();
    $cancelled_bookings_query = "SELECT Count(*) from CancelledBookings JOIN Bookings ON Bookings.bookingId = CancelledBookings.bookingID where Bookings.pid = $userId;";
    // echo $cancelled_bookings_query;
    // exit();
    $cancelled_bookings = mysqli_query($conn, $cancelled_bookings_query);
    if ($cancelled_bookings) {
        $cancelled_bookings_count = mysqli_fetch_column($cancelled_bookings, );
        return $cancelled_bookings_count;
    } else {
        return 0;
    }
}

// echo getNumberOfCancelledBookings();