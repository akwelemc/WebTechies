<?php
session_start(); // Start the session
include "../settings/connection.php";

if (isset($_POST["signUpbtn"])) {  
    $fname = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastName']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $telnum = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordRetype = mysqli_real_escape_string($conn, $_POST['password2']);
    $licenseNumber = mysqli_real_escape_string($conn, $_POST['licenseNumber']);
    $selected_bus = mysqli_real_escape_string($conn, $_POST['busSelect']);

    // Validate if password matches
    if($password != $passwordRetype){
        $_SESSION["password_mismatch"] = "Passwords do not match";
        header("Location: ../Login/register.php");
        exit();
    }

    // Check if email already exists
    $check_email_query = "SELECT * FROM People WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_result) > 0) {
        $_SESSION["email_exists"] = "An account with this email already exists";
        header("Location: ../Login/register.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the People table
    $insert_person_query = "INSERT INTO People(role_id, fname, lname, dob, email, telnumber, gender, passwrd) 
                            VALUES ('2', '$fname', '$lname', '$dob','$email', '$telnum', '$gender', '$hashed_password')";

    if (mysqli_query($conn, $insert_person_query)) {
        // Get the last inserted ID (user ID)
        $user_id = mysqli_insert_id($conn);

        echo "Selected Bus ID: " . $selected_bus;

        // Insert the driver's information into the Drivers table
        $insert_driver_query = "INSERT INTO driver(pid, bid, licenseNumber) 
                                VALUES ('$user_id', '$selected_bus', '$licenseNumber')";
        echo "Driver Insert Query: " . $insert_driver_query; // Debugging                      
        if (mysqli_query($conn, $insert_driver_query)) {
            $_SESSION["account_created"] = true;
            header("Location: ../Login/login.php");
            exit();
        } else {
            $_SESSION["account_created"] = "Error creating account. Please try again.";
            header("Location: ../Login/register.php");
            exit();
        }
    } else {
        $_SESSION["account_created"] = "Error creating account. Please try again.";
        header("Location: ../Login/register.php");
        exit();
    }
} else {
    $_SESSION["account_created"] = "Error creating account. Please try again.";
    header("Location: ../Login/register.php");
    exit();
}
?>
