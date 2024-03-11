<?php
include("../settings/connection.php");
include("../settings/core.php");

function getTripDetails()
{
    global $conn;
    $userID = userIdExist();
    $get_details_query = "SELECT bookingId, Bus.bid, TimeSlots.time, date_booked, BusStop.stopName, BookingStatus.status_name 
                     FROM Bookings 
                     JOIN TimeSlots ON TimeSlots.slotID = Bookings.time_slotID 
                     JOIN BusStop ON BusStop.bsid = Bookings.busStopID 
                     JOIN Bus ON Bus.bid = Bookings.bid 
                     JOIN BookingStatus ON BookingStatus.status_id = Bookings.bookingStatus 
                     WHERE Bookings.pid = '$userID' AND BookingStatus.status_name != 'deleted';";
    // $get_details_query = "SELECT bookingId,Bus.bid, TimeSlots.time, date_booked, BusStop.stopName, BookingStatus.status_name FROM Bookings JOIN TimeSlots ON TimeSlots.slotID = Bookings.time_slotID JOIN BusStop ON BusStop.bsid = Bookings.busStopID JOIN Bus ON Bus.bid = Bookings.bid JOIN BookingStatus ON BookingStatus.status_id = Bookings.bookingStatus WHERE Bookings.pid = $userID AND Boooking.status_name != 'deleted';";
    // echo $get_details_query;
    // exit();
    $query_result = mysqli_query($conn, $get_details_query);
    $result = mysqli_fetch_all($query_result, MYSQLI_ASSOC);
    return $result;
}
// var_dump(getTripDetails());

