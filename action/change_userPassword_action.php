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
                    header("Location: ../login/login.php");
                    exit;
                } else {
                    header("Location: ../view/Profile.php?error=update_failed");
                    exit;
                }
            } else {
                header("Location: ../view/Profile.php?error=password_mismatch");
                exit;
            }
        } else {
            header("Location: ../view/Profile.php?error=current_password_mismatch");
            exit;
        }
    } else {
        header("Location: ../view/Profile.php?error=user_data_retrieval_failed");
        exit;
    }
} else {
    header("Location: ../view/Profile.php?error=missing_data");
    exit;
}

$conn->close();
?>
