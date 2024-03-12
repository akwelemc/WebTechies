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

    $query = "SELECT * FROM people WHERE pid = '$userID' AND email = '$currentEmail'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE people SET email = '$newEmail' WHERE pid = '$userID'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            header("Location: ../view/Profile.php");
            exit;
        } else {
            header("Location: ../view/Profile.php?error=update_failed");
            exit;
        }
    } else {
        header("Location: ../view/Profile.php?error=current_email_mismatch");
        exit;
    }
} else {
    header("Location: ../view/Profile.php?error=missing_data");
    exit;
}

