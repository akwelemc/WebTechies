<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $query = "SELECT passwrd FROM people WHERE pid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldPasswordHash = $row['passwrd'];

        if (password_verify($_POST['currentPassword'], $oldPasswordHash)) {
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($newPassword === $confirmPassword) {
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateQuery = "UPDATE people SET passwrd = ? WHERE pid = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param("si", $newPasswordHash, $userID);
                $updateResult = $updateStmt->execute();

                if ($updateResult) {
                    unset($_SESSION["user_id"]);
                    unset($_SESSION["role_id"]);
                    unset($_SESSION["user_fname"]);
                    unset($_SESSION["user_lname"]);
                    handleBookingSuccess("Password changed successfully.");
                } else {
                    handleBookingError("Update failed. Please try again.");
                }
            } else {
                handleBookingError("Password mismatch. Please try again.");
            }
        } else {
            handleBookingError("Current password mismatch. Please try again.");
        }
    } else {
        handleBookingError("Error changing password. Please try again.");
    }
} else {
    handleBookingError("No data entered. Please try again.");
}

$conn->close();

function handleBookingError($errorMessage) {
    $_SESSION["password_update"] = false;
    $_SESSION["password_msg"] = $errorMessage;
    header("Location: ../admin/AdminProfile.php");
    exit();
}

function handleBookingSuccess($successMessage) {
    $_SESSION["password_update"] = true;
    $_SESSION["password_msg"] = $successMessage;
    header("Location: ../admin/AdminProfile.php");
    exit();
}

