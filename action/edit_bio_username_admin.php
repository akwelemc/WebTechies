


<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = $_SESSION['user_id'];

// Fetch role_id from the people table
$query = $conn->prepare("SELECT role_id FROM people WHERE pid = ?");
$query->bind_param('i', $userID);
$query->execute();
$query->store_result();
$query->bind_result($roleID);
$query->fetch();

if (isset($_POST['bio']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

    $updateQuery = $conn->prepare("UPDATE people SET bio = ?, fname = ?, lname = ? WHERE pid = ?");
    $updateQuery->bind_param('sssi', $bio, $firstName, $lastName, $userID);

    if ($updateQuery->execute()) {
        // Check role and redirect accordingly
        if ($roleID == 1) { // Assuming role_id 1 corresponds to admin
            header("Location: ../admin/AdminProfile.php");
            exit;
        } else { // For all other role IDs, assuming they are user role
            header("Location: ../view/Profile.php");
            exit;
        }
    } else {
        if ($roleID == 1) {
            header("Location: ../admin/AdminProfile.php?error=db");
            exit;
        } else {
            header("Location: ../view/Profile.php?error=db");
            exit;
        }
    }
} else {
    if ($roleID == 1) {
        header("Location: ../admin/AdminProfile.php?error=missing_data");
        exit;
    } else {
        header("Location: ../view/Profile.php?error=missing_data");
        exit;
    }
}
?>

