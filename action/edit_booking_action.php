<?php
session_start();
include("../settings/connection.php");

if (isset($_POST['updateBookingBtn'])) {
    // Check if the required variables are set
    if (isset($_GET['bookingId']) && (isset($_POST['newDate']) || isset($_POST['newTime']) || isset($_POST['newStop']))) {
        // Sanitize input
        $bookingId = mysqli_real_escape_string($conn, $_GET['bookingId']);
        $newDate = isset($_POST['newDate']) ? mysqli_real_escape_string($conn, $_POST['newDate']) : ''; // Handle optional date input
        $newTime = isset($_POST['newTime']) ? mysqli_real_escape_string($conn, $_POST['newTime']) : ''; // Handle optional time input
        $newStop = isset($_POST['newStop']) ? mysqli_real_escape_string($conn, $_POST['newStop']) : ''; // Handle optional stop input

        // Check if at least one field is provided
        if (empty($newDate) && empty($newTime) && empty($newStop)) {
            $_SESSION['booking_updated'] = 'At least one field must be entered';
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

        $update_query .= implode(', ', $update_fields);

        $update_query .= " WHERE bookingId = '$bookingId'";

        $update_query_result = mysqli_query($conn, $update_query);

        if ($update_query_result) {
            $_SESSION['booking_updated'] = 'Booking updated successfully';
            header('Location: ../view/History.php');
            exit();
        } else {
            $_SESSION['booking_updated'] = 'Failed to update booking';
            header('Location: ../view/History.php');
            exit();
        }
    } else {
        // Handle case where required variables are missing
        $_SESSION['booking_updated'] = 'Missing required variables';
        header('Location: ../vie/History.php');
        exit();
    }
}
