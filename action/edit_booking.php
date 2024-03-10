<?php
session_start();
include("../settings/connection.php");
if (isset($_POST['updateChoreBtn'])) {
    $choreId = $_GET['chore_id'];
    $newChore = mysqli_real_escape_string($conn,$_POST['newChore']);
    // echo $newChore;
    $update_query = "UPDATE Chores SET chorename = '$newChore' WHERE cid = '$choreId'";
    $update_query_result= mysqli_query($conn,$update_query);
    echo $newChore;
    echo $update_query_result;
    if($update_query_result==true){
        $_SESSION['chore_updated']='Updated successfully';
        header('Location: ../admin/choreManagement.php');
        exit();
    }

}
