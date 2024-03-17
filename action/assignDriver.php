<?php
// Start the session
session_start();

// Include database connection file
include "../settings/connection.php";

// Check if driver ID and bus ID are provided
if (isset($_POST['driver_id']) && isset($_POST['bus_id'])) {
    // Collect driver ID and bus ID from the form data
    $driver_id = $_POST['driver_id'];
    $bus_id = $_POST['bus_id'];
;
    
    if (mysqli_num_rows($driver_result) > 0) {
        // Update database to assign or unassign driver to bus based on bus ID
        if ($bus_id == 0) {
            // Unassign the driver by setting bus_id to NULL
            $update_query = "UPDATE Driver SET bid = NULL WHERE pid = $driver_id";
            $success_message = "Driver unassigned from the bus successfully.";
        } else {
            // Check if bus ID exists in the database
            $bus_check_query = "SELECT * FROM Bus WHERE bid = $bus_id";
            $bus_result = mysqli_query($conn, $bus_check_query);
            
            if (mysqli_num_rows($bus_result) > 0) {
                // Assign the driver to the bus by updating the bus record
                $update_query = "UPDATE Bus SET pid = $driver_id WHERE bid = $bus_id";
                $success_message = "Driver assigned to the bus successfully.";
            } else {
                // Invalid bus ID
                $_SESSION['driver_assign_success'] = false;
                $_SESSION['driver_assign_message'] = "Invalid bus ID.";
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        
        // Execute the update query
        if (mysqli_query($conn, $update_query)) {
            // Driver assigned or unassigned successfully
            $_SESSION['driver_assign_success'] = true;
            $_SESSION['driver_assign_message'] = $success_message;
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Database error
            $_SESSION['driver_assign_success'] = false;
            $_SESSION['driver_assign_message'] = "Error updating driver assignment: " . mysqli_error($conn);
            header("Location: ".$_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        // Invalid driver ID
        $_SESSION['driver_assign_success'] = false;
        $_SESSION['driver_assign_message'] = "Invalid driver ID.";
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
} else {
    // Missing input parameters
    $_SESSION['driver_assign_success'] = false;
    $_SESSION['driver_assign_message'] = "Please provide driver ID and bus ID.";
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}

