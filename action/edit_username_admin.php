<?php
include "../settings/connection.php";
include "../settings/core.php";

$userID = userIdExist();

if (isset($_POST['firstName']) && !empty($_POST['firstName'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $query = $conn->prepare("UPDATE people SET fname = ? WHERE pid = ?");
    $query->bind_param('si', $firstName, $userID);

    if ($query->execute()) {
        $_SESSION['username_msg'] = 'First name updated successfully.';
        $_SESSION['username_update'] = true;
    } else {
        $_SESSION['username_msg'] = 'Unable to update first name.';
        $_SESSION['username_update'] = false;
    }
}

if (isset($_POST['lastName']) && !empty($_POST['lastName'])) {
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $query = $conn->prepare("UPDATE people SET lname = ? WHERE pid = ?");
    $query->bind_param('si', $lastName, $userID);

    if ($query->execute()) {
        $_SESSION['username_msg'] = 'Last name updated successfully.';
        $_SESSION['username_update'] = true;
    } else {
        $_SESSION['username_msg'] = 'Unable to update last name.';
        $_SESSION['username_update'] = false;
    }
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
