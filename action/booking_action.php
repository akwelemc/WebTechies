<?php
include_once "../settings/connection.php";
include_once "../settings/core.php";

if (isset($_POST["bookingBtn"])) {
    // Check if user is logged in
    $userID = userIdExist();

    // Check if all required inputs are provided
    if (empty($_POST['time']) || empty($_POST['date']) || empty($_POST['stops'])) {
        handleBookingError("Please fill all the inputs. Please try again.");
    }

    // Collecting inputs from user
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $busStop = mysqli_real_escape_string($conn, $_POST['stops']);

    // Check if date and time are in the future
    $currentDateTime = date("Y-m-d");
    if (strtotime($date) <= strtotime($currentDateTime)) {
        handleBookingError("Booking date must be in the future.");
    }

    // Check if the selected day is Saturday or Sunday
    $selectedDayOfWeek = date('l', strtotime($date));
    if ($selectedDayOfWeek === 'Saturday' || $selectedDayOfWeek === 'Sunday') {
        handleBookingError("Bookings are not allowed on Saturdays or Sundays.");
    }

    // Check for duplicate bookings
    $check_booking_query = "SELECT * FROM `Bookings` WHERE pid = $userID AND date_booked = '$date' AND `time_slotID` = $time AND `bookingStatus` != 'deleted' AND `bookingStatus` != 'completed'";
    $check_booking_result = mysqli_query($conn, $check_booking_query);
    if (mysqli_num_rows($check_booking_result) > 0) {
        handleBookingError("User has already booked a slot");
    }

    // Find available bus
    $route_query = "SELECT `route_id` FROM BusStop WHERE bsid = $busStop";
    $route_result = mysqli_fetch_assoc(mysqli_query($conn, $route_query));
    $bus_query = "SELECT bid, capacity FROM Bus WHERE route_id = $route_result[route_id] OR route_id = 3";
    $bus_result = mysqli_query($conn, $bus_query);
    $bid = 0;
    while ($row = mysqli_fetch_assoc($bus_result)) {
        $bus_slots_query = "SELECT COUNT(*) FROM BusBooking WHERE bid = $row[bid]";
        $capacities = mysqli_fetch_column(mysqli_query($conn, $bus_slots_query));
        if ($capacities < $row['capacity']) {
            $bid = $row['bid'];
            break;
        }
    }
    if ($bid == 0) {
        handleBookingError("No available bus");
    }

    // Insert booking
    $insert_booking_query = "INSERT INTO `Bookings`(`pid`,`bid`,`date_booked`, `time_slotID`, `bookingStatus`,`busStopID`) VALUES ('$userID','$bid','$date','$time','1','$busStop')";
    if (mysqli_query($conn, $insert_booking_query)) {
        $bookingID = mysqli_insert_id($conn);
        $insert_Busbooking_query = "INSERT INTO `BusBooking`(`bid`,`bookingId`) VALUES ('$bid','$bookingID')";
        if (mysqli_query($conn, $insert_Busbooking_query)) {
            // Successful booking
            handleBookingSuccess("Booking successful");
        } else {
            handleBookingError("Error booking a slot. Please try again.");
        }
    } else {
        handleBookingError("Error booking a slot. Please try again.");
    }
}

// Redirect back to booking page
header("Location: ../view/bookingpage.php");
exit();

function handleBookingError($errorMessage) {
    $_SESSION["booked"] = false;
    $_SESSION["booking_created"] = $errorMessage;
    header("Location: ../view/bookingpage.php");
    exit();
}

function handleBookingSuccess($successMessage) {
    $_SESSION["booked"] = true;
    $_SESSION["booking_created"] = $successMessage;
    header("Location: ../view/bookingpage.php");
    exit();
}

