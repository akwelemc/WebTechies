<?php
session_start();

if (isset($_GET["bid"])) {
    // Include your database connection file
    include_once '../settings/connection.php';

    // Get the booking ID from the URL parameter
    $bid = $_GET["bid"];

    // Initialize variables to store updated values
    $updates = array();
    $types = '';
    $params = array(); // Initialize an array to store bind parameters

    // Check and add updated fields to the $updates array
    if (!empty($_POST['bus_name'])) {
        $updates[] = "busName=?";
        $types .= 's';
        $params[] = $_POST['bus_name']; // Add the value to the bind parameters array
    }
    if (!empty($_POST['capacity'])) {
        $updates[] = "capacity=?";
        $types .= 'i';
        $params[] = $_POST['capacity'];
    }
    if (!empty($_POST['reg_number'])) {
        $sql = "SELECT * FROM Bus WHERE registrationNumber= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST['reg_number']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Bus name already exists for another bus
            $_SESSION['bus_updated'] = false;
            $_SESSION['bus_msg'] = "Bus already exists. Please check the registration number";
            header("Location: ../admin/Buses.php");
            exit();
        }
        $updates[] = "registrationNumber=?";
        $types .= 's';
        $params[] = $_POST['reg_number'];
    }
    if (!empty($_POST['route'])) {
        $booking_check_sql = "SELECT COUNT(*) AS num_bookings FROM Bookings WHERE bid = ?";
        $booking_stmt = $conn->prepare($booking_check_sql);
        $booking_stmt->bind_param("i", $bus_id);
        $booking_stmt->execute();
        $booking_result = $booking_stmt->get_result();
        $num_bookings = $booking_result->fetch_assoc()['num_bookings'];
    
        // If there are bookings associated with the bus, prevent deletion
        if ($num_bookings > 0) {
            $_SESSION['bus_deleted'] = false;
            $_SESSION['bus_message'] = "Cannot chnage the route of bus with booked passengers.";
        }
        $updates[] = "route_id=?";
        $types .= 'i';
        $params[] = $_POST['route'];
    }

    // Construct the SQL query dynamically
    $sql = "UPDATE Bus SET " . implode(", ", $updates) . " WHERE bid=?";
    $stmt = $conn->prepare($sql);

    // Add the bid to the bind parameters array
    $types .= 'i'; // Add type for bid
    $params[] = $bid; // Add the bid value to the bind parameters array

    // Add the types as the first element in the params array
    array_unshift($params, $types);

    // Bind parameters dynamically
    call_user_func_array(array($stmt, 'bind_param'), refValues($params));

    // Execute the update query
    if ($stmt->execute()) {
        // Set success message in session variable
        $_SESSION['bus_updated'] = true;
        $_SESSION['bus_message'] = "Bus updated successfully.";
    } else {
        // Set error message in session variable
        $_SESSION['bus_updated'] = false;
        $_SESSION['bus_message'] = "Error updating booking: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
    // Close connection
    $conn->close();

    // Redirect back to the page where the edit request was made
    header("Location: ../admin/Buses.php");
    exit();
} else {
    // If the form was not submitted properly, redirect to an error page or handle it accordingly
    header("Location: ../admin/Buses.php");
    exit();
}

// Helper function to pass parameters by reference
function refValues($arr){
    $refs = array();
    foreach($arr as $key => $value)
        $refs[$key] = &$arr[$key];
    return $refs;
}

?>
