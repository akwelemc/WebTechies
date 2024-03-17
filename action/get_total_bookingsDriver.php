<?php
include("../settings/connection.php");
include_once("../settings/core.php");

function getTotalBookingsCountDriver()
{
    global $conn;
    $userId = userIdExist();
    $total_bookings_query = "SELECT Count(*) from Bookings JOIN Driver ON Driver.bid = Bookings.bid WHERE Driver.pid = $userId";

    $total_bookings = mysqli_query($conn, $total_bookings_query);
    if ($total_bookings) {
        $total_bookings_count = mysqli_fetch_column($total_bookings, );
        return $total_bookings_count;
    } else {
        return 0;
    }
}

// echo getNumberOfCancelledBookings();