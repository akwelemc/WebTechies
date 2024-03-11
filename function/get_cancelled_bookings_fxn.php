<?php
include("../action/get_cancelled_bookings.php");

$result = getNumberOfCancelledBookings();
echo '<span class="stat-value" >'.$result.'</span>';