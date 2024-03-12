<?php
include_once "../settings/connection.php";
include_once "../settings/core.php";
$userID = userIdExist();
if (isset($_POST["bookingBtn"])) {
    // Collecting inputs from user
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $busStop = mysqli_real_escape_string($conn, $_POST['stops']);

    // Check if date and time are in the future
    $currentDateTime = date("Y-m-d");
    // Combine the booking date and time
    $bookingDateTime = $date;
    if (strtotime($bookingDateTime) <= strtotime($currentDateTime)) {
        $_SESSION["booking_created"] = "Booking date and time must be in the future.";
        $_SESSION["booked"] = false;
        header("Location: ../view/bookingpage.php");
        exit();
    }
    // Get the day of the week for the selected date
    $selectedDayOfWeek = date('l', strtotime($date));

    // Check if the selected day is Saturday or Sunday
    if ($selectedDayOfWeek === 'Saturday' || $selectedDayOfWeek === 'Sunday') {
        $_SESSION["booking_created"] = "Bookings are not allowed on Saturdays or Sundays.";
        $_SESSION["booked"] = false;
        header("Location: ../view/bookingpage.php");
        exit();
    }
    $check_booking_query = "SELECT * FROM `Bookings` JOIN BookingSTatus ON BookingStatus.status_id = Bookings.bookingStatus WHERE pid = $userID AND date_booked = '$date' AND `time_slotID` = $time AND BookingStatus.status_name!= 'deleted' AND BookingStatus.status_name!= 'completed'";
    // echo $check_booking_query;
    // exit();
    $check_booking_result = mysqli_query($conn, $check_booking_query);
    // echo"3";
    // exit();
    if (mysqli_num_rows($check_booking_result) > 0) {
        $_SESSION["booking_created"] = "User has aready booked a slot";
        $_SESSION["booked"] = false;
        header("Location: ../view/bookingpage.php");

        exit();
    }
    // // query to select the route from BusStop table
    $route_query = "SELECT `route_id` FROM BusStop WHERE bsid = $busStop";
    $route_query_result = mysqli_query($conn, $route_query);
    $route_result = mysqli_fetch_assoc($route_query_result);
    // var_dump($route_result);
    // exit();
    $default_booking_status = 1;
    $default_bid = 1;
    // assigning a bus to the passenger is both have the same route
    $bus_query = "SELECT bid, capacity FROM Bus WHERE route_id = $route_result[route_id] OR route_id = 3";
    // echo $bus_query;
    // exit();
    $bus_query_result = mysqli_query($conn, $bus_query);
    $bus_result = mysqli_fetch_all($bus_query_result, MYSQLI_ASSOC);
    // var_dump($bus_result);
    // exit();
    // check which bus has space

    $capacities = 0;
    $bid = 0;
    foreach ($bus_result as $row) {
        // $bus_slots_query = "SELECT b.bid FROM Bus as b JOIN BusBooking as bb ON b.bid = bb.bid  GROUP BY b.bid HAVING COUNT(bb.bookingId) < b.capacity AND b.route IN (1, 3);";
        $bus_slots_query = "SELECT COUNT(*) FROM BusBooking WHERE bid = $row[bid]";
        $bus_slots_result = mysqli_query($conn, $bus_slots_query);
        $capacities = mysqli_fetch_column($bus_slots_result);
        if ($capacities < $row['capacity']) {
            $bid = $row['bid'];
            break;
        }
        // echo $capacities[$row['bid']];
        // exit();
    }
    ;
    if ($bid == 0) {
        $_SESSION["booking"] = false;
        $_SESSION["booking_created"] = "No available bus";
        header("Location: ../view/bookingpage.php");
        // echo "fail";
        exit();
    }
    $insert_booking_query = "INSERT INTO `Bookings`(`pid`,`bid`,`date_booked`, `time_slotID`, `bookingStatus`,`busStopID`) VALUES ('$userID',' $bid','$date','$time','$default_booking_status','$busStop')";
    // echo $insert_booking_query;
    // exit();
    if (mysqli_query($conn, $insert_booking_query)) {
        $select_bookingID_query = "SELECT bookingID FROM `Bookings` WHERE pid = $userID AND date_booked = '$date' AND `time_slotID` = $time";
        // echo $select_bookingID_query;
        // exit();
        $select_bookingID_result = mysqli_query($conn, $select_bookingID_query);
        $bookingID = mysqli_fetch_column($select_bookingID_result);

        $insert_Busbooking_query = "INSERT INTO `BusBooking`(`bid`,`bookingId`) VALUES ('$bid',' $bookingID')";
        $insert_Busbooking_result = mysqli_query($conn, $insert_Busbooking_query);

        if( mysqli_query($conn, $insert_Busbooking_query)){
        // Successful registration
        $_SESSION["booked"] = true;
        $_SESSION["booking_created"] = "Booking successful";
        header("Location: ../view/bookingpage.php");
        // echo "success";
        exit();
        }
        else{
            $_SESSION["booked"] = false;
            $_SESSION["booking_created"] = "Error booking a slot. Please try again.";
            header("Location: ../view/bookingpage.php");
            $conn->close();
            exit();
        }
    } else {
        // Registration failed
        $_SESSION["booked"] = false;
        $_SESSION["booking_created"] = "Error creating account. Please try again.";
        header("Location: ../view/bookingpage.php");
        // echo "failed";
        exit();
    }
} else {
    $_SESSION["booked"] = false;
    $_SESSION["booking_created"] = "Error booking a slot. Please try again.";
    header("Location: ../view/bookingpage.php");
    $conn->close();
    exit();

}

