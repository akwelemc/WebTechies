<?php
include("../action/get_time_slots.php");

$results = getTimes();
foreach ($results as $time) {
    echo "<option value='{$time['time']}'>{$time['time']}</option>";
}