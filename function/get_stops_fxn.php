<?php
include("../action/get_busStops.php");

$results = getBusStop();
// var_dump($results);
foreach ($results as $stops) {
    echo "<option value='{$stops['stopName']}'>{$stops['stopName']}</option>";
}
// echo "yes";