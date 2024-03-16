<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivers</title>
    <link rel="stylesheet" href="../css/Profile.css">
    
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    
    
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
                <div>
                    <h3 class="main-title"><a href="#" id="addDriver">Add Driver</a></h3>
                </div> 
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Assigned Bus</th>
                            <th>Time</th>
                            <th>Route</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                    </table> 
            </div>
        </div>
        
        
        
        
        <div id="addDriverModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addDriverModal')">&times;</span>
                <h2 style="color: black;">Add Driver</h2>
                <form id="addDriverForm">
                    <label for="driverName">Driver Name:</label>
                    <input type="text" id="driverName" name="driverName" required>
                    <label for="licenseNumber">License Number:</label>
                    <input type="text" id="licenseNumber" name="licenseNumber" required>
                    <label for="assignBus">Assign Bus:</label>
                    <select id="assignBus" name="assignBus" required>
                        <option value="">Select Bus</option>
                        <option value="bus1">Bus 1</option>
                        <option value="bus2">Bus 2</option>
                    </select>
                    <button type="submit">Add Driver</button>
                </form>
            </div>
        </div>
        <script src="../js/Driver.js"></script>
</body> 
</html>    
