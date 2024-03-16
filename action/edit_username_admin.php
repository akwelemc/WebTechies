<?php
include "../settings/connection.php";
include "../settings/core.php";

// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../login/login.php");
//     exit();
// }

$userID = userIdExist();

if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    // echo'done';
    // exit();
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);

    $query = $conn->prepare("UPDATE people SET fname = ?, lname = ? WHERE pid = ?");
    $query->bind_param('ssi', $firstName, $lastName, $userID);


    if ($query->execute()) {
        echo'done4';
        exit();
        $_SESSION['username_msg'] = 'Username updated';
        $_SESSION['username_update'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {

        $_SESSION['username_msg'] = 'Unable to update name';
        $_SESSION['username_update'] = false;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
} else {

    $_SESSION['username_msg'] = 'Unable to update name. Try again';
    $_SESSION['username_update'] = false;
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}



