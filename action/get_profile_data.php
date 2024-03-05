<?php
include("../settings/connection.php");
include("../settings/core.php");

$userID = userIdExist();

$profile_data_query="SELECT * FROM `People` WHERE pid = '$userID'";
echo $profile_data_query;