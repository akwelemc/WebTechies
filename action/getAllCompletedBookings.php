<?php
include_once("../settings/connection.php");
include_once("../settings/core.php");

function getAllCompletedBookings()
{
    global $conn;
    $userId = userIdExist();
    $total_completed_bookings_query = "SELECT Count(*) as total_booking from Bookings JOIN BookingStatus ON BookingStatus.status_id = Bookings.bookingStatus where BookingStatus.status_name = 'Completed';";
    // echo $total_completed_bookings_query;
    // exit();
    $total_completed_bookings = mysqli_query($conn, $total_completed_bookings_query);
    if ($total_completed_bookings) {
        $total_completed_bookings_count = mysqli_fetch_column($total_completed_bookings);
        return $total_completed_bookings_count;
    } else {
        return 0;
    }
}
