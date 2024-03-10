<?php
if (isset($_GET["bookingId"])) {
    $bookingId = $_GET["bookingId"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        crossorigin="anonymous">
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
            <li>
                <a href="../view/History.php">
                    <i class="fas fa-history"></i>
                    <span class="nav-item">History</span>
                </a>
            </li>
            <li>
                <a href="../view/Maps.php">
                    <i class="fas fa-map"></i>
                    <span class="nav-item">Maps</span>
                </a>
            </li>
            <li class="active">
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
                
                <h2>Edit Booking</h2>
            </div>    
            <div class="user">
                <div class="search-box">
                    <i class="fa-solid fa-search"> </i>    
                    <input type="text" placeholder="Search"/>
                </div>      
                <img src="../images/profile.jpg" alt=""> 
            </div>    
        </div> 

        <section class="available-buses">
            <form name="editBooking" id="editBooking" method="post" action='<?php echo "../action/edit_booking_action.php?bookingId=" . $bookingId ?>'>
                <div class="date">
                    <div>
                        <label for="newDate">New Date</label>
                    </div>
                    <div>
                        <input name="newDate" type="date" id="newDate" placeholder="New Date">
                    </div>
                </div>
                <div id="bus-list" class="bus-list"></div>
                <div>
                    <label for="stops">New Stop</label>
                    <select id="stops" name="newStop">
                        <option disabled selected value="0">Choose a bus stop</option>
                        <?php
                        include("../action/get_busStops.php");
                        $results = getBusStop();
                        foreach ($results as $stops) {
                            echo "<option value='{$stops['bsid']}'>{$stops['stopName']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="time">New Time</label>
                    <select id="time" name="newTime">
                        <option disabled selected value="0">Choose a time</option>
                        <?php
                        include("../action/get_time_slots.php");
                        $results = getTimes();
                        foreach ($results as $time) {
                            echo "<option value='{$time['slotID']}'>{$time['time']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <button type="submit" name="updateBookingBtn" id="updateBooking">Submit</button>
                </div>
            </form>
</section>

    </div>
</body>
</html>