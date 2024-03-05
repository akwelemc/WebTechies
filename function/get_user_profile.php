<?php
include("../action/get_profile_data.php");

$result = getProfileDetails() ;

echo "<p><strong>Name: </strong> $result[fname] $result[lname]</p>";
echo "<p><strong>Email:</strong>$result[email]</p>";
echo"<p><strong>Date of Birth:</strong> $result[dob]</p>";
if ($result["bio"] == NULL) {
    echo "<p><strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis non justo suscipit consectetur.</p>";
}
else{
    echo "<p><strong>Bio:</strong> $result[bio]</p>";
}    
