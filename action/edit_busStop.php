<?php
session_start();

// Include your database connection file
include_once '../settings/connection.php';

if (isset($_GET["bsid"])) {
    // Get the bus stop ID from the URL parameter
    $bsid = $_GET["bsid"];

    // Initialize session variables
    $_SESSION['busStop_updated'] = false;
    $_SESSION['busStop_update_message'] = "";

    // Check if the new stop name already exists
    $newStopName = $_POST['stopName'];
    $checkQuery = "SELECT COUNT(*) AS num_stops FROM BusStop WHERE stopName = ? AND bsid != ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("si", $newStopName, $bsid);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    $numStops = $checkResult->fetch_assoc()['num_stops'];

    if ($numStops > 0) {
        // If the new stop name already exists for another stop, set an error message and redirect
        $_SESSION['busStop_updated'] = false;
        $_SESSION['busStop_update_message'] = "A bus stop with the same name already exists.";
        header("Location: ../admin/Busstop.php");
        exit();
    }

    // Initialize variables to store updated values
    $updates = array();
    $types = '';
    $params = array(); // Initialize an array to store bind parameters

    // Check and add updated fields to the $updates array
    if (!empty($_POST['stopName'])) {
        $updates[] = "stopName=?";
        $types .= 's';
        $params[] = $_POST['stopName']; // Add the value to the bind parameters array
    }
    if (!empty($_POST['description'])) {
        $updates[] = "routeDescription=?";
        $types .= 's';
        $params[] = $_POST['description'];
    }
    if (!empty($_POST['route'])) {
        $updates[] = "route_id=?";
        $types .= 'i';
        $params[] = $_POST['route'];
    }

    // Construct the SQL query dynamically
    $sql = "UPDATE BusStop SET " . implode(", ", $updates) . " WHERE bsid=?";
    $stmt = $conn->prepare($sql);

    // Add the bsid to the bind parameters array
    $types .= 'i'; // Add type for bsid
    $params[] = $bsid; // Add the bsid value to the bind parameters array

    // Bind parameters dynamically
    $stmt->bind_param($types, ...$params);

    // Execute the update query
    if ($stmt->execute()) {
        // Set success message in session variable
        $_SESSION['busStop_updated'] = true;
        $_SESSION['busStop_update_message'] = "Bus stop updated successfully.";
    } else {
        // Set error message in session variable
        $_SESSION['busStop_updated'] = false;
        $_SESSION['busStop_update_message'] = "Error updating bus stop: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();

    // Redirect back to the page where the edit request was made
    header("Location: ../admin/Busstop.php");
    exit();
} else {
    // If the form was not submitted properly, redirect to an error page or handle it accordingly
    $_SESSION['busStop_updated'] = false;
    $_SESSION['busStop_update_message'] = "No bus stop ID specified.";
    header("Location: ../admin/Busstop.php");
    exit();
}

