<?php

function getDriverLicenseNumber() {
    

    // Include the database connection script
    include "../settings/connection.php";

    // Check if the user ID is set in the session
    if (!isset($_SESSION['user_id'])) {
        return "User ID not set in session";
    }

    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Check if the user ID is valid
    if (!is_numeric($user_id) || $user_id <= 0) {
        return "Invalid user ID";
    }

    // Prepare the SQL query to fetch the driver's license number
    $query = "SELECT d.licenseNumber 
              FROM Driver d 
              WHERE d.pid = $user_id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        return "Error executing query: " . mysqli_error($conn);
    }

    // Check if a row was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result row
        $row = mysqli_fetch_assoc($result);
        // Return the driver's license number
        return $row['licenseNumber'];
    } else {
        return "Driver's license number not found";
    }

    // Close the database connection
    mysqli_close($conn);
}

?>
