<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['currentEmail']) && isset($_POST['newEmail'])) {
    $currentEmail = $_POST['currentEmail'];
    $newEmail = $_POST['newEmail'];

    // Check if the new email already exists
    $query = "SELECT * FROM people WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $newEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['email_update'] = false;
        $_SESSION["email_msg"] = "Email update failed. Email already exists.";
        header("Location: ../admin/AdminProfile.php");
        exit;
    }

    // Check if the current email matches the user's email
    $query = "SELECT * FROM people WHERE pid = ? AND email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $userID, $currentEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the user's email
        $updateQuery = "UPDATE people SET email = ? WHERE pid = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("si", $newEmail, $userID);
        $stmt->execute();

        $_SESSION['email_update'] = true;
        $_SESSION["email_msg"] = "Email updated successfully";
        header("Location: ../admin/AdminProfile.php");
        exit;
    } else {
        $_SESSION['email_update'] = false;
        $_SESSION["email_msg"] = "Email update failed. Current email incorrect";
        header("Location: ../admin/AdminProfile.php");
        exit;
    }
} else {
    $_SESSION['email_update'] = false;
    $_SESSION["email_msg"] = "Email update failed. Please try again";
    header("Location: ../admin/AdminProfile.php");
    exit;
}
?>
