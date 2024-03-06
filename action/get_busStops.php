<?php
include_once "../settings/connection.php";
include_once("../settings/core.php");
session_start();
function getBusStop(){
global $conn;
$userID = userIdExist();
$busStop_query = "SELECT bsid, stopName FROM `BusStop`";
$busStop_query_query_result = mysqli_query($conn,$busStop_query);
$result = mysqli_fetch_all($busStop_query_query_result, MYSQLI_ASSOC);

return $result;
}
// var_dump(getBusStop());
// $conn->close();