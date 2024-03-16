<?php
include_once "../settings/connection.php";
include_once("../settings/core.php");
session_start();
function getRoute(){
global $conn;
$userID = userIdExist();
$route_query = "SELECT route_id, `route` FROM `Routes`";
$route_query_query_result = mysqli_query($conn,$route_query);
$result = mysqli_fetch_all($route_query_query_result, MYSQLI_ASSOC);

return $result;
}
// var_dump(getRoute());
// $conn->close();