<?php


include_once "../function/stats_fxns.php";
include_once "../action/get_profile_data.php";
include "../function/get_driver_route.php";
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
                    <a href="../admin/AdminDashboard.php" class="logo">
                        <img src="../images/Bus.png" alt="">
                        <span class="nav-item">BusBoss</span>
                    </a>
                </li>
                <li class="active">
                    <a href="../admin/AdminDashboard.php">
                        <i class="fas fa-home"></i>
                        <span class="nav-item">Home</span>
                    </a>
                </li>
                <li >
                    <a href="../admin/AdminProfile.php">
                        <i class="fas fa-user"></i>
                        <span class="nav-item">Profile</span>
                    </a>
                </li>
                <li>
              <a href="../admin/bookinginfo.php">
                  <i class="fas fa-book"></i>
                  <span class="nav-item">Booking Info</span>
              </a>
            </li>
                <li>
                    <a href="../admin/AdminHelp.php">
                        <i class="fas fa-question-circle"></i>
                        <span class="nav-item">Help</span>
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
                    
                    <h2>DRIVER DASHBOARD<img src="../images/bus10.jpg" alt="bus" style=" width:120px;height:120px"></h2>
                </div>    
                <div class="user">
                    <!-- <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>       -->
                    <img src="../images/defaultprofile3.png" alt=""> 
                </div>    
            </div>
            <div class="middlebar1">
                <?php 
                    $result = getProfileDetails();
                    echo "<h1>Welcome, <strong>{$result['fname']}</strong>!</h1>"; 
                ?>

                <div class="message-container">
                    <p class="message">Get ready for an amazing journey ahead! Remember to enjoy every moment and stay focused. Your passengers are looking forward to a safe and delightful ride with you.</p>
                </div>

                <h3 class="route-info">Today's route: <?php echo getRoute(); ?> </h3>
            </div>



            <div class="middlebar" >
                <div class="new-box">
                    <div id="progressCard" class="outter-card1" > 
                        <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Total bookings
                            </span>
                            <span class="stat-value">
                            <?php
                            include("../action/get_total_bookingsDriver.php");
                            $totalBookings = getTotalBookingsCountDriver();
                            echo " $totalBookings";
                            ?>
                            </span>
                        </div> 
                        <i class="fas fa-spinner icon" aria-hidden="true"></i>
                        </i>
                        </div>
                    </div> 
                    
                    
                    <div id="incompleteCard" class="outter-card2" >
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
    
                    <div id="completedCard" class="outter-card3" >
                        <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Cancelled bookings
                            </span>
                            <span class="stat-value">
                            
                            <?php
                                include("../action/getAllCancelledBookings.php");
                                echo getAllfCancelledBookings();
                                ?>
                            </span>
                        </div> 
                        <i class="fas fa-check icon">
                        </i>
                        </div>
                    </div>
                </div>       
            </div>

            
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>            
                    
        </div>
        
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const xValues = ["Total bookings", "Daily Bookings","Cancelled bookings"];
            const yValues = [<?php echo $totalBookings; ?>, <?php echo $totalBookingsForDay; ?>,<?php echo getAllfCancelledBookings(); ?>];
            const barColors = ["#b91d47", "#00aba9", "#2b5797"];

            new Chart("myChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Bus Management stats",
                        fontSize: 20, // Adjust font size as needed
                        fontColor: '#333', // Adjust font color as needed
                        fontStyle: 'bold' // Make the title bold
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    aspectRatio: 1,
                    scales: {
                        yAxes: [{
                            display: false
                        }],
                        xAxes: [{
                            display: false
                        }]
                    }
                }
            });
        });
    </script>
        
        
</body>
</html>
