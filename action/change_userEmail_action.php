<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['currentEmail']) && isset($_POST['newEmail'])) {
    $currentEmail = mysqli_real_escape_string($conn, $_POST['currentEmail']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['newEmail']);

  // Ensure that the user email is unique
  $check_email_query = "SELECT * FROM People WHERE email = '$newEmail'";
  $check_email_result = mysqli_query($conn, $check_email_query);



  if (mysqli_num_rows($check_email_result) > 0) {
    $_SESSION['email_update'] = false;
    $_SESSION["email_msg"] = "Account with this email already exists";
    header("Location: ../view/Profile.php");
    // echo "email fail";
    exit();
  }
    $query = "SELECT * FROM people WHERE pid = '$userID' AND email = '$currentEmail'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE people SET email = '$newEmail' WHERE pid = '$userID'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            header("Location: ../view/Profile.php");
            handleBookingSuccess("Email changed");
            exit;
        } else {
            handleBookingError("Update failed. Please try again.");
            header("Location: ../view/Profile.php?error=update_failed");
            exit;
        }
    } else {
        handleBookingError("Entered wrong email. Please try again.");
        header("Location: ../view/Profile.php?error=current_email_mismatch");
        exit;
    }
} else {
    handleBookingError("Please enter data. Please try again.");
    header("Location: ../view/Profile.php?error=missing_data");
    exit;
}

function handleBookingError($errorMessage) {
    $_SESSION["email_update"] = false;
    $_SESSION["email_msg"] = $errorMessage;
    header("Location: ../view/Profile.php");
    exit();
}

function handleBookingSuccess($successMessage) {
    $_SESSION["email_update"] = true;
    $_SESSION["email_msg"] = $successMessage;
    header("Location: ../view/Profile.php");
    exit();
}
