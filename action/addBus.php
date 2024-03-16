<?php
include_once("../settings/connection.php");
include_once("../settings/core.php");
// Start session
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (isset($_POST['busName']) && isset($_POST['capacity']) && isset($_POST['regNumber']) && isset($_POST['route'])) {
        // Check if the bus already exists
        $checkSql = "SELECT * FROM Bus WHERE registration_number = ?";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bind_param("s", $regNumber);
        $regNumber = $_POST['regNumber'];
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['bus_added'] = false;
            $_SESSION['bus_message'] = "Bus with this registration number already exists.";
        } else {
            // Prepare and bind parameters for insertion
            $insertSql = "INSERT INTO buses (bus_name, capacity, registration_number, route) VALUES (?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("siss", $busName, $capacity, $regNumber, $route);

            // Set parameters and execute
            $busName = $_POST['busName'];
            $capacity = $_POST['capacity'];
            $regNumber = $_POST['regNumber'];
            $route = $_POST['route'];

            if ($insertStmt->execute()) {
                $_SESSION['bus_added'] = true;
                $_SESSION['bus_message'] = "Bus added successfully.";
            } else {
                $_SESSION['bus_added'] = false;
                $_SESSION['bus_message'] = "Error: " . $insertSql . "<br>" . $conn->error;
            }
            // Close statement
            $insertStmt->close();
        }
        // Close check statement and connection
        $checkStmt->close();
        $conn->close();

        // Redirect back to the page where the form was submitted
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['bus_added'] = false;
        $_SESSION['bus_message'] = "All fields are required.";
    }
}
?>
