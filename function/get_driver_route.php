<?php
include "../settings/connection.php";
include_once "../settings/core.php";

function getRoute()
{
    global $conn;
    $userId = userIdExist();
    $query = "SELECT 
    Routes.route
FROM 
    Driver
JOIN 
    Bus ON Driver.bid = Bus.bid
JOIN 
    Routes ON Bus.route_id = Routes.route_id
WHERE 
    Driver.pid = $userId";

    // echo $query;
    // exit();

    $query_result = mysqli_execute_query($conn, $query);
    if($query_result!=false){
        $route_name = mysqli_fetch_column($query_result);
        return $route_name;
    }
    return "Not found";
};