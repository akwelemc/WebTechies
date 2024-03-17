<?php 
include("../settings/core.php");
userIdExist();
?>
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
    <style>
        .modal {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 1000; 
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
    
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
                    <h2><img src="../images/bus10.jpg" alt="bus" style=" width:120px;height:120px">DRIVER INFO</h2>
                </div>  
                 
                <div class="user">
                    <img src="../images/defaultprofile3.png" alt=""> 
                </div>    
            </div>


            <!-- <div id="AssignDriverModal" class="modal">
                <div class="modal-content">
                <span class="close" onclick="closeModal('AssignDriverModal')">&times;</span>
                    <h2>Assign Driver</h2>
                    <form id="assignDriverForm" method="post" action="../action/assignDriver.php">
                        <label for="driverSelect">Select Driver:</label>
                        <select id="driverSelect" name="driver_id" required>
                            <option value = -1>Select a driver </option>
                        <?php
                        // include_once("../action/getAllDriver.php");
                        ?>
                    </select><br>
                        <label for="busSelect">Select Bus:</label>
                        <select id="busSelect" name="bus_id" required>
                        <option value = -1>Select a bus </option>
                        <option value = 0>Unassign a driver</option>
                        <?php
                        // include_once("../action/getBusses.php");
                        ?>                        </select><br>
                        <button type="submit">Assign Driver</button>
                    </form>
                </div>
            </div> -->


      
            
            
            <div class="table-container">
                <!-- <div>
                    <h3 class="main-title"><a href="#" id="AssignDriver">Assign Driver</a></h3>
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

    <script>
   document.addEventListener("DOMContentLoaded", function() {
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "block";
        }
    }

    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById("AssignDriver").addEventListener("click", function () {
        openModal("AssignDriverModal");
    });

    document.querySelector(".close").addEventListener("click", function () {
        closeModal("AssignDriverModal");
    });

    // Close modal if user clicks outside of it
    window.addEventListener("click", function (event) {
        if (event.target.classList.contains('modal')) {
            closeModal("AssignDriverModal");
        }
    });
});

    </script>
</body> 
</html>    
