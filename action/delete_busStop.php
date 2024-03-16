<?php
session_start(); // Start the session


// Include your database connection file
include_once '../settings/connection.php';

if (isset($_GET['bsid'])) {
    // Get the bus stop ID from the query parameters
    $bs_id = $_GET['bsid'];

    // Initialize session variables
    $_SESSION['busStop_deleted'] = false;
    $_SESSION['busStop_msg'] = "";

    // Check if there are any bookings associated with the bus stop
    $busStop_check_sql = "SELECT COUNT(*) AS num_busStops FROM Bookings WHERE busStopID = ?";
    $busStop_stmt = $conn->prepare($busStop_check_sql);
    $busStop_stmt->bind_param("i", $bs_id);
    $busStop_stmt->execute();
    $busStop_result = $busStop_stmt->get_result();
    $num_busStops = $busStop_result->fetch_assoc()['num_busStops'];

    // If there are bookings associated with the bus stop, prevent deletion
    if ($num_busStops > 0) {
        // echo'failed 2';
        // exit();
        $_SESSION['busStop_deleted'] = false;
        $_SESSION['busStop_msg'] = "Cannot delete bus stop with booked passengers.";
    } else {
        // Prepare and execute the delete query
        // echo "fails";
        // exit();
        $delete_sql = "DELETE FROM BusStop WHERE bsid = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $bs_id);

        if ($delete_stmt->execute()) {
            // Set success message in session variable
            $_SESSION['busStop_deleted'] = true;
            $_SESSION['busStop_msg'] = "Bus stop deleted successfully.";
        } else {
            // Set error message in session variable
            $_SESSION['busStop_msg'] = "Error deleting bus stop: " . $conn->error;
        }

        // Close statement
        $delete_stmt->close();
    }

    // Close prepared statement
    $busStop_stmt->close();

    // Close connection
    $conn->close();

    // Redirect back to the previous page or a fallback URL if HTTP_REFERER is not set
    $redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "../admin/Busstop.php";
    header("Location: " . $redirect_url);
    exit();
}

// If the script reaches here, there was no 'bsid' parameter in the URL
echo "No bus stop ID specified.";
exit();
?>
