<?php
include('../settings/connection.php');


function getBusInfoForDriver($driverPID) {
    global $conn;

    
    $sql = "SELECT bid FROM driver WHERE pid = $driverPID";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $busID = $row['bid'];
        
        
        $sql = "SELECT busName, capacity, registrationNumber FROM bus WHERE bid = $busID";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $busInfo = $result->fetch_assoc();
            return $busInfo; 
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}


$userID = $_SESSION['user_id']; 

$busInfo = getBusInfoForDriver($userID);

if ($busInfo) {
    echo "<strong>Bus Name:</strong> " . $busInfo['busName'] . "<br>";
    echo "<strong>Registration Number:</strong> " . $busInfo['registrationNumber'] . "<br>";
} else {
    echo "No bus assigned to the driver.";
}

?>
