<?php
include "../action/get_driver_license_action.php";



$licenseNumber = getDriverLicenseNumber();

    echo "<p><strong>License Number:</strong> $licenseNumber</p>";

?>

