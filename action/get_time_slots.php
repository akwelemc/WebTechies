<?php
include_once "../settings/connection.php";
include_once("../settings/core.php");
session_start();
function getTimes(){
    global $conn;
    $userID = userIdExist();
    $timeSlots_query = "SELECT `slotID`, `time` FROM `TimeSlots`";
    $timeSlots_query_result = mysqli_query($conn, $timeSlots_query);
    $result = mysqli_fetch_all($timeSlots_query_result, MYSQLI_ASSOC);
    return $result;
}

// var_dump(getTimes());