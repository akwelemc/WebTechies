<?php
include "../settings/connection.php";
include "../settings/core.php";

// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../login/login.php");
//     exit();
// }
// echo"ecomole";
// exit();

$userID = userIdExist();


if (isset($_POST['saveUpdate'])) {
    $firstName = isset($_POST['firstName']) ? mysqli_real_escape_string($conn, $_POST['firstName']):'';
    $lastName = isset($_POST['lastName']) ? mysqli_real_escape_string($conn, $_POST['lastName']):'';

    // echo'haaaa';
    // exit();
    // Check if at least one field is provided
    if (empty($firstName)&& empty($lastName)) {
        $_SESSION['username_msg'] = 'At least one field must be entered';
        $_SESSION['username_update'] = false;
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }

    // echo'halle';
    // exit();
    // Update query
    $update_query = "UPDATE People SET";

    // Build the query dynamically based on the presence of each field
    $update_fields = array();

    if (!empty($firstName)) {
        $update_fields[] = " fname= '$firstName'";
    }
    if (!empty($lastName)) {
        $update_fields[] = " lname = '$lastName'";
    }
    // echo"amen";
    // exit();
    $update_query .= implode(', ', $update_fields);
    $update_query .= " WHERE pid = '$userID'";
    // echo $update_query;
    // exit();

    // $update_query_result = mysqli_query($conn, $update_query);
    // $query = $conn->prepare("UPDATE people SET fname = ?, lname = ? WHERE pid = ?");
    // $query->bind_param('ssi', $bio, $firstName, $lastName, $userID);
    // echo $query;
    // exit();
    
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['username_msg'] = 'Username updated';
        $_SESSION['username_update'] = true;
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['username_msg'] = 'Unable to update name';
        $_SESSION['username_update'] = false;
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    }
} else {
    $_SESSION['username_msg'] = 'Unable to update name. Try again';
    $_SESSION['username_update'] = false;
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
}
?>
