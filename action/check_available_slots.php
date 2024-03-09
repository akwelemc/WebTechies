<?php // slots.php

function getAvailableSlots($date, $busStop, $route) {
    global $conn;

    $date = mysqli_real_escape_string($conn, $date);
    $busStop = mysqli_real_escape_string($conn, $busStop);
    $route = mysqli_real_escape_string($conn, $route);

    // Assuming there's a Buses table with capacity information
    $busCapacityQuery = "SELECT capacity FROM Buses WHERE route = '$route' AND busStop = '$busStop'";
    $capacityResult = mysqli_query($conn, $busCapacityQuery);

    if (!$capacityResult) {
        return false; // Handle the error as needed
    }

    $busCapacity = mysqli_fetch_assoc($capacityResult)['capacity'];

    // Query to get available slots based on bus capacity
    $query = "SELECT bs.slot_id, bs.time
              FROM BusSlots bs
              LEFT JOIN (
                  SELECT slot_id, COUNT(*) as booked_passengers
                  FROM Bookings b
                  WHERE b.date = '$date'
                  GROUP BY b.slot_id
              ) booked ON bs.slot_id = booked.slot_id
              WHERE bs.date = '$date' AND bs.busStop = '$busStop' AND bs.route = '$route'
              HAVING booked_passengers < $busCapacity OR booked_passengers IS NULL";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $slots = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $slots;
    } else {
        return false;
    }
}
