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

        // echo 'hi:'.$bookingId.'yo'.$newDate.'u'.$newTime.'h'.$newStop.'';
        // exit();
        if ($newDate != "") {
            // Check if date and time are in the future
            // echo $newDate;
            // exit();
            $currentDateTime = date("Y-m-d");
            // Combine the booking date and time
            $bookingDateTime = $newDate;
            if (strtotime($bookingDateTime) <= strtotime($currentDateTime)) {
                $_SESSION["booking_updated"] = "Booking date and time must be in the future.";
                $_SESSION["update"] = false;
                header("Location: ../view/History.php");
                exit();
            }
            // Get the day of the week for the selected date
            $selectedDayOfWeek = date('l', strtotime($date));

            // Check if the selected day is Saturday or Sunday
            if ($selectedDayOfWeek === 'Saturday' || $selectedDayOfWeek === 'Sunday') {
                $_SESSION["booking_updated"] = "Bookings are not allowed on Saturdays or Sundays.";
                $_SESSION["update"] = false;
                header("Location: ../view/History.php");
                exit();
            }
            // echo"hh";
            // exit();
            if ($newTime != "") {
                $check_booking_query = "SELECT * FROM `Bookings` WHERE pid = $userID AND date_booked = '$newDate' AND `time_slotID` = $newTime ";
                // echo $check_booking_query;
                // exit();
                $check_booking_result = mysqli_query($conn, $check_booking_query);
                if (mysqli_num_rows($check_booking_result) > 0) {
                    $_SESSION["booking_updated"] = "User has aready booked a slot";
                    $_SESSION["update"] = false;
                    header("Location: ../view/History.php");
                    exit();
                }

            }



        }
        // Check if at least one field is provided
        if (empty($newDate) && empty($newTime) && empty($newStop)&& empty($newStatus)) {
            $_SESSION['booking_updated'] = 'At least one field must be entered';
            $_SESSION['update'] = false;
            header('Location: ../view/History.php');
            exit();
        }

        // Update query
        $update_query = "UPDATE Bookings SET";

        // Build the query dynamically based on the presence of each field
        $update_fields = array();

        if (!empty($newDate)) {
            $update_fields[] = " date_booked = '$newDate'";
        }

        if (!empty($newTime)) {
            $update_fields[] = " time = '$newTime'";
        }

        if (!empty($newStop)) {
            $update_fields[] = " busStopID = '$newStop'";
        }
        if (!empty($newStatus)) {
            $update_fields[] = " bookingStatus = '$newStatus'";
        }

        $update_query .= implode(', ', $update_fields);

        $update_query .= " WHERE bookingId = '$bookingId'";
        // echo $update_query;
        // exit();

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
        header('Location: ../vie/History.php');
        exit();
    }
}
