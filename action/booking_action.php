<?php
include_once "../settings/connection.php";
include_once "../settings/core.php";
if (isset($_POST["bookingBtn"])) {
    // Collecting inputs from user
    // echo"hii";
    $userID = userIdExist();
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $busStop = mysqli_real_escape_string($conn, $_POST['stops']);

    // Ensure that the user email is unique
    $check_booking_query = "SELECT * FROM `Bookings` WHERE pid = $userID AND date_booked = '$date' AND departureTime = '$time'";
    // echo $check_booking_query;
    // exit();
    $check_booking_result = mysqli_query($conn, $check_booking_query);

    if (mysqli_num_rows($check_booking_result) > 0) {
        $_SESSION["email_exists"] = "User has aready booked a slot";
        header("Location: ../view/bookingpage.php");

        exit();
    }
    // query to select the route from BusStop table

    $route_query = "SELECT `route` FROM BusStop WHERE bsid = $busStop";
    $route_query_result = mysqli_query($conn, $route_query);
    $route_result = mysqli_fetch_assoc($route_query_result);
    $booking_status = "booked";
    $default_bid = 1;
    // assigning a bus to the passenger is both have the same route
    $bus_query = "SELECT * FROM Bus WHERE route = $route_result[route] OR route = 'Either'";

    

    // $bus_query = "SELECT bus.bid from Bus Where route = "$route_result[]"


    // echo $busStop;
    $insert_booking_query = "INSERT INTO `Bookings`(`pid`,`bid`,`date_booked`, `departureTime`, `bookingStatus`,`busStopID`) VALUES ('$userID',' $default_bid','$date','$time','$booking_status','$busStop')";
    // echo $insert_booking_query;
    // exit();
    if (mysqli_query($conn, $insert_booking_query)) {
        // Successful registration
        $_SESSION["bookinhg_created"] = true;
        header("Location: ../view/bookingpage.php");
        // echo "success";
        exit();
    } else {
        // Registration failed
        $_SESSION["booking_created"] = "Error creating account. Please try again.";
        header("Location: ../view/bookingpage.php");
        // echo "failed";
        exit();
    }
} else {
    $_SESSION["account_created"] = "Error creating account. Please try again.";
    // header("Location: ../view/bookingpage.php");
    echo "fail";
    $conn->close();
    exit();

}

