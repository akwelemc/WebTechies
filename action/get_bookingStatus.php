<?php
include_once "../settings/connection.php";
include_once("../settings/core.php");
session_start();
function getStatus(){
    global $conn;
    $userID = userIdExist();
    $status_query = "SELECT `status_id`, `status_name` FROM `BookingStatus` where status_name!='deleted'";
    $status_query_result = mysqli_query($conn, $status_query);
    $result = mysqli_fetch_all($status_query_result, MYSQLI_ASSOC);
    return $result;
}
