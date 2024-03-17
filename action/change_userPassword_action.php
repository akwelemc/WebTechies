<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if new password is equal to old password
    if ($newPassword === $currentPassword) {
        handlePasswordError("New password cannot be the same as the old password.");
    }

    // Check if new password matches confirm password
    if ($newPassword !== $confirmPassword) {
        handlePasswordError("Passwords do not match. Please try again.");
    }

    // Retrieve old password hash from database
    $query = "SELECT passwrd FROM people WHERE pid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldPasswordHash = $row['passwrd'];

        // Verify if current password matches the one stored in the database
        if (password_verify($currentPassword, $oldPasswordHash)) {
            // Hash the new password
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

            // Update the password in the database
            $updateQuery = "UPDATE people SET passwrd = ? WHERE pid = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("si", $newPasswordHash, $userID);
            if ($updateStmt->execute()) {
                handlePasswordSuccess("Password changed successfully.");
            } else {
                handlePasswordError("Error updating password. Please try again.");
            }
        } else {
            handlePasswordError("Current password is incorrect. Please try again.");
        }
    } else {
        handlePasswordError("Error retrieving user data. Please try again.");
    }
} else {
    handlePasswordError("Please fill out all the fields.");
}

function handlePasswordError($errorMessage) {
    $_SESSION["password_update"] = false;
    $_SESSION["password_msg"] = $errorMessage;
    header("Location: ../view/Profile.php");
    exit();
}

function handlePasswordSuccess($successMessage) {
    $_SESSION["password_update"] = true;
    $_SESSION["password_msg"] = $successMessage;
    header("Location: ../view/Profile.php");
    exit();
}
