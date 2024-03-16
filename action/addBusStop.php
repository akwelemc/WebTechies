<?php
session_start(); // Start the session

// Include your database connection file
include_once '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (isset($_POST['stopName']) && isset($_POST['stopDescription']) && isset($_POST['route'])) {
        // Check if the bus stop already exists
        $checkSql = "SELECT * FROM BusStop WHERE stopName = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $stopName);
        $stopName = $_POST['stopName'];
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['bus_stop_added'] = false;
            $_SESSION['bus_stop_message'] = "Bus stop already exists.";
        } else {
            // Prepare and bind parameters for insertion
            $sql = "INSERT INTO BusStop (routeDescription, stopName, route_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $stopDescription, $stopName, $route_id);

            // Set parameters and execute
            $stopName = $_POST['stopName'];
            $stopDescription = $_POST['stopDescription'];
            $route_id = $_POST['route'];

            if ($stmt->execute()) {
                $_SESSION['bus_stop_added'] = true;
                $_SESSION['bus_stop_message'] = "Bus stop added successfully.";
            } else {
                $_SESSION['bus_stop_added'] = false;
                $_SESSION['bus_stop_message'] = "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();
        }
        // Close check statement
        $checkStmt->close();

        // Redirect back to the page where the form was submitted
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['bus_stop_added'] = false;
        $_SESSION['bus_stop_message'] = "All fields are required.";

        // Redirect back to the page where the form was submitted
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
