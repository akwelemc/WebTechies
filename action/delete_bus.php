<?php
session_start(); // Start the session

// Include your database connection file
include_once '../settings/connection.php';

if (isset($_GET['bid'])) {
    // Get the bus ID from the query parameters
    $bus_id = $_GET['bid'];

    // Check if there are any bookings associated with the bus
    $booking_check_sql = "SELECT COUNT(*) AS num_bookings FROM Bookings WHERE bid = ?";
    $booking_stmt = $conn->prepare($booking_check_sql);
    $booking_stmt->bind_param("i", $bus_id);
    $booking_stmt->execute();
    $booking_result = $booking_stmt->get_result();
    $num_bookings = $booking_result->fetch_assoc()['num_bookings'];

    // If there are bookings associated with the bus, prevent deletion
    if ($num_bookings > 0) {
        $_SESSION['bus_deleted'] = false;
        $_SESSION['bus_message'] = "Cannot delete bus with booked passengers.";
    } else {
        // Prepare and execute the delete query
        $delete_sql = "DELETE FROM Bus WHERE bid = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $bus_id);

        if ($delete_stmt->execute()) {
            // Set success message in session variable
            $_SESSION['bus_deleted'] = true;
            $_SESSION['bus_message'] = "Bus deleted successfully.";
        } else {
            // Set error message in session variable
            $_SESSION['bus_deleted'] = false;
            $_SESSION['bus_message'] = "Error deleting bus: " . $conn->error;
        }

        // Close statement
        $delete_stmt->close();
    }

    // Close booking statement and connection
    $booking_stmt->close();
    $conn->close();

    // Redirect back to the page where the delete request was made
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

// If the script reaches here, there was no 'bid' parameter in the URL
echo "No bus ID specified.";
exit();

