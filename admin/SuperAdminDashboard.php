<?php
include "../function/stats_fxns.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="AdminDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
                <li class="active" >
                    <a href="../admin/SuperAdminDashboard.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li  >
                    <a href="../admin/SuperAdminProfile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li >
                    <a href="../admin/bookings.php">
                        <i class="fas fa-book"></i>
                        <span class="nav-item"> Bookings</span>
                    </a>
                </li>
                <li >
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
                <li >
                    <a href="../admin/Buses.php">
                        <i class="fas fa-bus-alt"></i>
                        <span class="nav-item">Buses</span>
                    </a>
                </li>
                <li >
                    <a href="../admin/Busstop.php">
                        <i class="fas fa-ban"></i>
                        <span class="nav-item">Bus Stop</span>
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
                    
                    <h2>Dashboard</h2>
                </div>    
                <div class="user">
                    <!-- <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>       -->
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div>    
            <div class="middlebar" >
                <div class="new-box">
                    <div id="progressCard" class="outter-card" > 
                        <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Total bookings
                            </span>
                            <span class="stat-value">
                            <?php
                            $totalBookings = getTotalBookingCount();
                            echo " $totalBookings";
                            ?>
                            </span>
                        </div> 
                        <i class="fas fa-spinner icon" aria-hidden="true"></i>
                        </i>
                        </div>
                    </div> 
                    
                    
                    <div id="incompleteCard" class="outter-card" >
                        <div class="stat-icon">
                            <div class="stat">
                                <span class="title">
                                   Daily Bookings
                            </span>
                            <span class="stat-value">
                            <?php
                            $totalBookingsForDay = getTotalBookingCountForDay(date('Y-m-d')); //
                            echo " $totalBookingsForDay";
                            ?>
                        </span>
                        </div> 
                        <i class="fa fa-times-circle icon">
                        </i>
                        </div>
                        
                    </div>
    
                    <div id="completedCard" class="outter-card" >
                        <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Cancelled bookings
                            </span>
                            <span class="stat-value">
                            
                            
                            </span>
                        </div> 
                        <i class="fas fa-check icon">
                        </i>
                        </div>
                    </div>
                </div>       
            </div>
            
            <div class="middlebar2">

                <div class="charts-card">
                    <h2 class="chart-title">Top 5 Products</h2>
                    <div id="bar-chart"></div>
                </div>
    
                <div class="charts-card">
                    <h2 class="chart-title">Purchase and Sales Orders</h2>
                    <div id="area-chart"></div>
                </div>
            </div>
        </div>        

    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <script src="Dashboard.js"></script> 
</body>
</html>
