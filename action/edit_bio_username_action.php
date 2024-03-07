<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

if (isset($_POST['bio']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

    $query = $conn->prepare("UPDATE people SET bio = ?, fname = ?, lname = ? WHERE pid = ?");
    $query->bind_param('sssi', $bio, $firstName, $lastName, $userID);

    if ($query->execute()) {
        header("Location: ../admin/AdminProfile.php");
        exit;
    } else {
  
        header("Location: ../admin/AdminProfile.php?error=db");
        exit;
    }
} else {

    header("Location: ../admin/AdminProfile.php?error=missing_data");
    exit;
}


$conn->close();
?>
