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

    $get_current_status_query = "SELECT status_name FROM BookingStatus JOIN Bookings ON Bookings.bookingStatus =BookingStatus.status_id where bookingID =$booking_id";
    // echo $get_current_status_query;
    // exit();
    $get_current_status_result = mysqli_query($conn, $get_current_status_query);
    $get_current_status = mysqli_fetch_column($get_current_status_result);
    if ($get_current_status == "booked") {
        $insert_cancelled_booking_query = "INSERT INTO `CancelledBookings`(`bookingID`) VALUES ('$bookingID')";
        if (!mysqli_query($conn, $insert_cancelled_booking_query)) {
            echo "hi";
            exit();
            $_SESSION["booking_Deletedmsg"] = "Booking deletion failed";
            $_SESSION["booking_deleted"] = false;
            header('Location: ../view/History.php');
            exit();
        }
    }
    $select_bookingStatus = "SELECT status_id FROM BookingStatus WHERE status_name = 'deleted'";
    $select_bookingID_result = mysqli_query($conn, $select_bookingStatus);
    $status_id = mysqli_fetch_column($select_bookingID_result);
    // Then update status to 'deleted' in Bookings
    $update_status_query = "UPDATE `Bookings` SET `bookingStatus`='$status_id' WHERE bookingId = $booking_id";
    $delete_result = mysqli_query($conn, $update_status_query);
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
exit();

$conn->close();
