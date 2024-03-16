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
            <li >
                <a href="../admin/Buses.php">
                    <i class="fas fa-bus-alt"></i>
                    <span class="nav-item">Buses</span>
                </a>
            </li>
            <li class="active">
                <a href="../admin/Buses.php">
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
                    
                    <h2>Bus Stops</h2>
                </div>    
                <div class="user">
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div> 

            


            <div id="addBusStopModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('addBusStopModal')">&times;</span>
                    <h2 style="color: black;">Add Bus Stop</h2>
                    <form id="addBusStopForm">
                        <label for="stopName">Stop Name:</label>
                        <input type="text" id="stopName" name="stopName" required>
                        <label for="Bsid">Stop Bsid</label>
                        <input type="text" id="Bsid" name="Bsid" required>
                        <label for="routeDescription">Route Description:</label>
                        <input type="text" id="routeDescription" name="routeDescription" required>
                        <button type="submit" style="margin-top: 10px;">Add Bus Stop</button>
                    </form>
                </div>
            </div>


            <div class="table-container">
                <div>
                    <h3 class="main-title" style="float:left"><a href="#" id="addBusStop">Add Bus Stop</a></h3>
                </div> 
                <table>
                    <thead>
                        <tr>
                            <th>Bsid</th>
                            <th>routeDescription</th>
                            <th>Stop Name</th>
                            <th>Route</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table> 
            </div>
        </div>
    

    <script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    document.getElementById("addBusStop").addEventListener("click", function () {
        openModal("addBusStopModal");
    });

    document.querySelector(".close").addEventListener("click", function () {
        closeModal("addBusStopModal");
    });

    </script>

    
</body> 
</html>    