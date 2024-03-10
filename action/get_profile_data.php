<?php
include "../settings/connection.php";
include("../settings/core.php");

function getProfileDetails(){
global $conn;
$userID = userIdExist();
$profile_data_query = "SELECT fname,lname, dob, email, gender, telnumber,bio FROM `People` WHERE pid = '$userID'";
$profile_data_result = mysqli_query($conn, $profile_data_query);
$result = mysqli_fetch_assoc($profile_data_result);
return $result;
}
// var_dump(getProfileDetails());
