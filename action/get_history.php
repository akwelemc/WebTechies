<?php
include("../settings/connection.php");
include("../settings/core.php");

function getTripDetails()
{
    global $conn;
    $userID = userIdExist();
    $get_details_query = "SELECT bookingId,Bus.bid, TimeSlots.time, date_booked, BusStop.stopName FROM Bookings JOIN TimeSlots ON TimeSlots.slotID = Bookings.time_slotID JOIN BusStop ON BusStop.bsid = Bookings.busStopID JOIN Bus ON Bus.bid = Bookings.bid WHERE Bookings.pid = $userID;";

    // echo $get_details_query;
    // exit();
    $query_result = mysqli_query($conn, $get_details_query);
    $result = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
    return $result;
}
// var_dump(getTripDetails());

