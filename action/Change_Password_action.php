<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $query = "SELECT passwrd FROM people WHERE pid = '$userID'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $oldPasswordHash = $row['passwrd'];

        if (password_verify($_POST['currentPassword'], $oldPasswordHash)) {
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($newPassword === $confirmPassword) {
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                $updateQuery = "UPDATE people SET passwrd = '$newPasswordHash' WHERE pid = '$userID'";
                $updateResult = mysqli_query($conn, $updateQuery);

                if ($updateResult) {
                    unset($_SESSION["user_id"]);
                    unset($_SESSION["role_id"]);
                    unset($_SESSION["user_fname"]);
                    unset($_SESSION["user_lname"]); 
                    handleBookingError("Password changed succesfully."); 
                    header("Location: ../login/login.php");
                    exit;
                } else {
                    header("Location: ../admin/AdminProfile.php?error=update_failed");
                    exit;
                }
            } else {
                handleBookingError("Update failed. Please try again.");
                header("Location: ../admin/AdminProfile.php?error=password_mismatch");
                exit;
            }
        } else {
            handleBookingError("Password mismatch. Please try again.");

            header("Location: ../admin/AdminProfile.php?error=current_password_mismatch");
            exit;
        }
    } else {
        handleBookingError("Error changing password. Please try again.");

        header("Location: ../admin/AdminProfile.php?error=user_data_retrieval_failed");
        exit;
    }
} else {
    handleBookingError("No data entered. Please try again.");
    header("Location: ../admin/AdminProfile.php?error=missing_data");
    exit;
}

$conn->close();
function handleBookingError($errorMessage) {
    $_SESSION["password_update"] = false;
    $_SESSION["password_msg"] = $errorMessage;
    header("Location: ../view/Profile.php");
    exit();
}

function handleBookingSuccess($successMessage) {
    $_SESSION["password_update"] = true;
    $_SESSION["password_msg"] = $successMessage;
    header("Location: ../view/Profile.php");
    exit();
}
?>
