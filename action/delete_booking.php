<?php
session_start();
include("../settings/connection.php");

// Check if the 'bookingID' parameter is set in the URL
// echo"hi";
// exit();
if (isset($_GET['bookingId'])) {
    // Get the booking ID from the URL
    $booking_id = mysqli_real_escape_string($conn, $_GET['bookingId']);

    // Delete from busbooking first
    $delete_busbooking_query = "DELETE FROM busbooking WHERE bookingId = $booking_id";
    mysqli_query($conn, $delete_busbooking_query);

    // Then delete from Bookings
    $delete_bookings_query = "DELETE FROM Bookings WHERE bookingId = $booking_id";
    mysqli_query($conn, $delete_bookings_query);
    // Check if the deletion was successful
    if ($delete_result == true) {
        $_SESSION["booking_deleted"] = true;
        $_SESSION["booking_Deletedmsg"] = "Booking deleted successfully";
        // Redirect to the History page or any other page as needed
        header('Location: ../view/History.php');
        exit();
    }
}

// If the booking ID is not set or deletion fails, redirect to the History page
$_SESSION["booking_Deletedmsg"] = "Booking deletion failed";
$_SESSION["booking_deleted"] = false;
header('Location: ../view/History.php');
$conn->close();
