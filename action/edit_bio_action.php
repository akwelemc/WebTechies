<?php
include "../settings/connection.php";
include "../settings/core.php";

// Start the session
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect if user is not logged in
    header("Location: ../login/login.php");
    exit();
}

$userID = userIdExist();

if (isset($_POST['bio'])) {
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    $query = $conn->prepare("UPDATE people SET bio = ? WHERE pid = ?");
    $query->bind_param('si', $bio, $userID);

    if ($query->execute()) {
        // Set success message session variable
        $_SESSION['success_message'] = "Bio updated successfully.";
        $_SESSION['bio_updated'] = true; // Set bio updated boolean session variable

        // Redirect to the previous page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    } else {
        // Set error message session variable
        $_SESSION['error_message'] = "Error updating bio: " . $conn->error;
        $_SESSION['bio_updated'] = false; // Set bio updated boolean session variable

        // Redirect to the previous page
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit;
    }
} else {
    // Redirect to the previous page if the form data is not set
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}
?>
