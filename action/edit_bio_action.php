<?php
include "../settings/connection.php";
include "../settings/core.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit();
}

$userID = userIdExist();

if (isset($_POST['bio'])) {
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

  
    $query = $conn->prepare("UPDATE people SET bio = ? WHERE pid = ?");
    $query->bind_param('si', $bio, $userID);

    if ($query->execute()) {
       
        header("Location: ../view/Profile.php");
        exit;
    } else {
        
        header("Location: ../view/Profile.php?error=db");
        exit;
    }
} else {
    
    header("Location: ../view/Profile.php?error=missing_data");
    exit;
}
?>
