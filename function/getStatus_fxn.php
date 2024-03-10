<?php
include("../action/get_bookingStatus.php");

$results = getStatus();
foreach ($results as $stat) {
    echo "<option value='{$stat['status_id']}'>{$sta['stat_name']}</option>";
}