<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses</title>
    <link rel="stylesheet" href="../css/Profile.css">
    
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="sweetalert.min.js"></script>
    
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
                <li>
                    <a href="../admin/Drivers.php">
                        <i class="fas fa-id-card"></i>
                        <span class="nav-item"> Drivers</span>
                    </a>
                </li>
                <li class="active">
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
                    
                    <h2>Bus Info</h2>
                </div>    
                <div class="user">
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div> 


            <div id="addBusModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('addBusModal')">&times;</span>
                    <h2>Add Bus</h2>
                    <form id="addBusForm">
                        <label for="busName">Bus Name:</label>
                        <input type="text" id="busName" name="busName" required>
                        <label for="capacity">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" required>
                        <label for="regNumber">Registration Number:</label>
                        <input type="text" id="regNumber" name="regNumber" required>
                        <label for="route">Route:</label>
                        <input type="text" id="route" name="route" required>
                        <button type="submit">Add Bus</button>
                    </form>
                </div>
            </div>

            <div id="addBusStopModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('addBusStopModal')">&times;</span>
                    <h2 style="color: black;">Add Bus Stop</h2>
                    <form id="addBusStopForm">
                        <label for="stopName">Stop Name:</label>
                        <input type="text" id="stopName" name="stopName" required>
                        <label for="stopLocation">Stop Location:</label>
                        <input type="text" id="stopLocation" name="stopLocation" required>
                        <label for="arrivalTime">Arrival Time:</label>
                        <input type="time" id="arrivalTime" name="arrivalTime" required>
                        <button type="submit" style="margin-top: 10px;">Add Bus Stop</button>
                    </form>
                </div>
            </div>



            <div class="table-container">
                <div>
                    <h3 class="main-title"><a href="#" id="addBus">Add Bus</a></h3>
                    <h3 class="main-title" style="float:left"><a href="#" id="addBusStop">Add Bus Stop</a></h3>
                </div> 
                <table>
                    <thead>
                        <tr>
                            <th>Busname</th>
                            <th>Capacity</th>
                            <th>Registration Number</th>
                            <th>Route</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table> 
            </div>
        </div>
    



    <script src="../js/Buses.js"></script>
    </body> 
</html>    