<?php


function userIdExist() {
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to login page if user is not logged in
        header("Location: ../Login/login.php");
        exit(); // Stop script execution
    }

    // Regenerate session ID to ensure uniqueness
    // session_regenerate_id(true);

    // Return the user ID
    return $_SESSION['user_id'];
}

