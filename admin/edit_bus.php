<?php
    session_start();
if (isset($_GET["bid"])) {
    $bookingId = $_GET["bid"];
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
<nav>
            <ul>
                <li>
                    <a href="../admin/SuperAdminDashboard.php" class="logo">
                        <img src="../images/Bus.png" alt="">
                        <span class="nav-item">BusBoss</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../admin/SuperAdminDashboard.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li >
                    <a href="../admin/SuperAdminProfile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/bookings.php">
                        <i class="fas fa-book"></i>
                        <span class="nav-item"> Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/People.php">
                        <i class="fas fa-users"></i>
                        <span class="nav-item"> People</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/Drivers.php">
                        <i class="fas fa-id-card"></i>
                        <span class="nav-item"> Drivers</span>
                    </a>
                </li>
                <li>
                    <a href="../admin/Buses.php">
                        <i class="fas fa-bus-alt"></i>
                        <span class="nav-item">Buses</span>
                    </a>
                </li>

                <li>
                    <a href="../Login/logout.php" class="logout">
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
                <!-- <div class="search-box">
                    <i class="fa-solid fa-search"> </i>    
                    <input type="text" placeholder="Search"/>
                </div>       -->
                <img src="../images/profile.jpg" alt=""> 
            </div>    
        </div> 

        <section class="available-buses">
            <form name="editBooking" id="editBooking" method="post" action='<?php echo "../action/edit_bus_action.php?bid=" . $bookingId ?>'>
                <div class="date">
                    <div>
                        <label >New Bus name</label>
                    </div>
                    <div>
                        <input name="bus_name" type="text" id="newName" placeholder="New Name">
                    </div>
                </div>
                <div>
                    <label for="capacity">New Capacity</label>
                    <input name = "capacity" type="number" placeholder="New capacity">
                </div>
                <div>
                    <label for="registrationNumber">New Registration Number</label>
                    <input name = "reg_number" type="text" placeholder="New Registration Number">
                </div>
                <div>
                    <label for="time">New Route</label>
                    <select id="route" name="route">
                        <option disabled selected value="0">Choose a route</option>
                        <?php
                        include_once("../action/get_routes.php");
                        $results = getRoute();

                        foreach ($results as $result) {
                            echo "<option value = '{$result['route_id']}'>{$result['route']}</option>";
                        }

                        ?>
                    </select>
                </div>
            
                <div>
                    <button type="submit" name="editBusBtn" id="updateBus">Submit</button>
                </div>
            </form>
        </section>

    </div>
</body>
</html>