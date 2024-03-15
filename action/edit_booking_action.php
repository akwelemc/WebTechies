<?php
session_start();
include("../settings/connection.php");
include("../settings/core.php");

if (isset($_POST['updateBookingBtn'])) {
    // Check if the required variables are set
    if (isset($_GET['bookingId']) && (isset($_POST['newDate']) || isset($_POST['newTime']) || isset($_POST['newStop']))) {
        // Sanitize input
        $userID = userIdExist();
        $bookingId = mysqli_real_escape_string($conn, $_GET['bookingId']);
        $newDate = isset($_POST['newDate']) ? mysqli_real_escape_string($conn, $_POST['newDate']) : '';
        $newTime = isset($_POST['newTime']) ? mysqli_real_escape_string($conn, $_POST['newTime']) : '';
        $newStop = isset($_POST['newStop']) ? mysqli_real_escape_string($conn, $_POST['newStop']) : '';
        $newStatus = isset($_POST['bookingStatus']) ? mysqli_real_escape_string($conn, $_POST['bookingStatus']) : '';

        // Ensure at least one field is provided
        if (empty($newDate) && empty($newTime) && empty($newStop) && empty($newStatus)) {
            $_SESSION['booking_updated'] = 'At least one field must be entered';
            $_SESSION['update'] = false;
            header('Location: ../view/History.php');
            exit();
        }

        // Check if the new date is in the future
        $currentDate = date("Y-m-d");
        if (!empty($newDate) && strtotime($newDate) <= strtotime($currentDate)) {
            $_SESSION["booking_updated"] = "Booking date must be in the future.";
            $_SESSION["update"] = false;
            header("Location: ../view/History.php");
            exit();
        }

        // Check if the selected day is Saturday or Sunday
        if (!empty($newDate)) {
            $selectedDayOfWeek = date('l', strtotime($newDate));
            if ($selectedDayOfWeek === 'Saturday' || $selectedDayOfWeek === 'Sunday') {
                $_SESSION["booking_updated"] = "Bookings are not allowed on Saturdays or Sundays.";
                $_SESSION["update"] = false;
                header("Location: ../view/History.php");
                exit();
            }
        }

        // Check for duplicate bookings
        if (!empty($newDate) && !empty($newTime)) {
            $check_booking_query = "SELECT * FROM `Bookings` WHERE pid = $userID AND date_booked = '$newDate' AND `time_slotID` = $newTime";
            $check_booking_result = mysqli_query($conn, $check_booking_query);
            if (mysqli_num_rows($check_booking_result) > 0) {
                $_SESSION["booking_updated"] = "User has already booked a slot";
                $_SESSION["update"] = false;
                header("Location: ../view/History.php");
                exit();
            }
        }

        // Check if the user tries to update the status for past or future rides
        if (empty($newDate) && !empty($newStatus)) {
            $query_getCurrentDate = "SELECT date_booked FROM Bookings WHERE bookingId = $bookingId";
            $query_getCurrentDate_result = mysqli_query($conn, $query_getCurrentDate);
            $oldDate = mysqli_fetch_assoc($query_getCurrentDate_result)['date_booked'];
            $currentDateTime = date("Y-m-d");

            // Get the status name
            $query_getStatus = "SELECT status_name FROM BookingStatus WHERE status_id = $newStatus";
            $query_getStatus_result = mysqli_query($conn, $query_getStatus);
            $status = mysqli_fetch_assoc($query_getStatus_result)['status_name'];

            // Check if the status update is valid
            if ((strtotime($oldDate) >= strtotime($currentDateTime)) && $status == "Completed") {
                $_SESSION["booking_updated"] = "Cannot complete a future ride.";
            } else if ((strtotime($oldDate) <= strtotime($currentDateTime)) && $status == "Booked") {
                $_SESSION["booking_updated"] = "Cannot book past rides";
            } else {
                $_SESSION["booking_updated"] = "Invalid status update";
            }
            $_SESSION["update"] = false;
            header("Location: ../view/History.php");
            exit();
        }

        // Update query
        $update_query = "UPDATE Bookings SET";
        $update_fields = array();

        if (!empty($newDate)) {
            $update_fields[] = " date_booked = '$newDate'";
        }
        if (!empty($newTime)) {
            $update_fields[] = " time_slotID = '$newTime'";
        }
        if (!empty($newStop)) {
            $update_fields[] = " busStopID = '$newStop'";
        }
        if (!empty($newStatus)) {
            $update_fields[] = " bookingStatus = '$newStatus'";
        }

        // Add bus assignment logic
        if (!empty($newStop)) {
            // Your logic for assigning a bus to the booking goes here
        }

        $update_query .= implode(', ', $update_fields);
        $update_query .= " WHERE bookingId = '$bookingId'";

        $update_query_result = mysqli_query($conn, $update_query);

        if ($update_query_result) {
            $_SESSION['booking_updated'] = 'Booking updated successfully';
            $_SESSION['update'] = true;
            header('Location: ../view/History.php');
            exit();
        } else {
            $_SESSION['booking_updated'] = 'Failed to update booking';
            $_SESSION['update'] = false;
            header('Location: ../view/History.php');
            exit();
        }

    } else {
        // Handle case where required variables are missing
        $_SESSION['booking_updated'] = 'Missing required variables';
        $_SESSION['update'] = false;
        header('Location: ../view/History.php');
        exit();
    }
}
?>
