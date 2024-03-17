<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
    <link rel="stylesheet" href="../css/Profile.css">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
                <li >
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
                <li class="active">
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
                    <h2>Driver Info</h2>
                </div>  
                 
                <div class="user">
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div>

      
            
            
            <div class="table-container">
                <!-- <div>
                    <h3 class="main-title"><a href="#" id="addDriver">Add Driver</a></h3>
                </div>  -->
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>license Number</th>
                            <th>Contact</th>
                            <th>Assigned Bus</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include("../action/getDrivers.php");
                    ?>
                        </tbody>
                    </table> 
            </div>
        </div>

    <script src="../js/Driver.js"></script>
</body> 
</html>    
