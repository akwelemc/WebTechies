<?php
include("../settings/core.php");
 userIdExist();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps</title>
    <link rel="stylesheet" href="../css/Maps.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <style>
        @keyframes bounce {
            0% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0); }
        }
        #location-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: bounce 1s infinite;
        }
    </style>

</head>
<body>
<nav>
        <ul>
            <li>
                <a href="../view/UserDashboard.php" class="logo">
                    <img src="../images/Bus.png" alt="">
                    <span class="nav-item">BusBoss</span>
                </a>
            </li>
            <li>
                <a href="../view/UserDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="../view/Profile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li >
                <a href="../view/History.php">
                    <i class="fas fa-history"></i>
                    <span class="nav-item">History</span>
                </a>
            </li>
            <li class="active">
                <a href="../view/Maps.php">
                    <i class="fas fa-map"></i>
                    <span class="nav-item">Maps</span>
                </a>
            </li>
            <li>
              <a href="../view/bookingpage.php">
                  <i class="fas fa-book"></i>
                  <span class="nav-item">Booking</span>
              </a>
            </li>
            <li>
                <a href="../view/help.php">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                </a>
            </li>
            <li>
                <a href="../view/login.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>
    </nav>
        
        <div class="main">
            <div class="firstbar">
                <div class="head-title">
                    
                    <h2>Maps & Tracking</h2>
                </div>    
                <div class="user">
                    <!-- <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>       -->
                    <img src="../images/defaultprofile2.jpg" alt=""> 
                </div>    
            </div> 
            <div id="map">
            </div>
        </div>

        <script>
            let map = document.getElementById('map');
            let locationIcon = document.createElement('img');
            locationIcon.setAttribute('src', 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png');
            locationIcon.setAttribute('id', 'location-icon');
            map.appendChild(locationIcon);
    
            let watchId = navigator.geolocation.watchPosition(position => {
                const {latitude, longitude} = position.coords;
                map.innerHTML = '<iframe width="100%" height="800" id="map-iframe" src="https://maps.google.com/maps?q=' + latitude + ',' + longitude + '&amp;z=15&amp;output=embed"></iframe>';
                let mapIframe = document.getElementById('map-iframe');
                mapIframe.onload = function() {
                    let locationIcon = mapIframe.contentDocument.getElementById('location-icon');
                    locationIcon.style.display = 'none'; 
                }
            });
    
 
            function stopWatching() {
                navigator.geolocation.clearWatch(watchId);
                console.log('Position watching stopped.');
            }
        </script>       
</body>
</html>