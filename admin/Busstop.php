<?php 
session_start();
if (isset($_GET["bsid"])) {
    $bsId = $_GET["bsid"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses</title>
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
            <li>
                <a href="../admin/SuperAdminDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
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
            <li class="active">
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
                    
                <h2><img src="../images/bus10.jpg" alt="bus" style=" width:120px;height:120px">BUS STOPS</h2>
            </div>    
            <div class="user">
                <img src="../images/defaultprofile3.png" alt=""> 
            </div>    
        </div> 

            
            
        <div id="addBusStopModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addBusStopModal')">&times;</span>
                <h2 style="color: black;">Add Bus Stop</h2>
                <form id="addBusStopForm" method ="post" action ="../action/addBusStop.php">
                    <label for="stopName">Stop Name:</label>
                    <input type="text" id="stopName" name="stopName" required>
                    <label for="stopLocation">Description</label>
                    <input type="text" id="stopDescription" name="stopDescription" required>
                    <label for="arrivalTime">Route</label>
                    <select id="route" name="route" required>
                        <option disabled selected value="0">Choose a route</option>
                        <?php
                        include_once("../action/get_routes.php");
                        $results = getRoute();

                        foreach ($results as $result) {
                                echo "<option value = '{$result['route_id']}'>{$result['route']}</option>";
                        }

                        ?>
                    </select> <button type="submit" style="margin-top: 10px;">Add Bus Stop</button>
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
            
                            <?php
                            include_once("../action/getAllBusStops.php");
                            ?>
                        </tbody>
                    </table>
                </div>
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

        function showAlert(message, type) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 2000
            });

        }


        <?php

        if (isset($_SESSION["bus_stop_added"])) {
            // Check if it's a success or error
            $type = ($_SESSION["bus_stop_added"] === true) ? 'success' : 'error';

            // Get the message f
            $message = $_SESSION["bus_stop_message"];
            // Unset the session variables
            unset($_SESSION["bus_stop_added"]);
            unset($_SESSION["bus_stop_message"]);
            echo "showAlert('$message', '$type');";
        }
        if (isset($_SESSION["busStop_deleted"])) {
            // Check if it's a success or error
            $type = ($_SESSION["busStop_deleted"] === true) ? 'success' : 'error';

            // Get the message f
            $message = $_SESSION["busStop_msg"];
            // Unset the session variables
            unset($_SESSION["busStop_deleted"]);
            unset($_SESSION["busStop_msg"]);
            echo "showAlert('$message', '$type');";
        }
        if (isset($_SESSION["busStop_updated"])) {
            // Check if it's a success or error
            $type = ($_SESSION["busStop_updated"] === true) ? 'success' : 'error';

            // Get the message f
            $message = $_SESSION["busStop_update_message"];
            // Unset the session variables
            unset($_SESSION["busStop_updated"]);
            unset($_SESSION["usStop_update_message"]);
            echo "showAlert('$message', '$type');";
        }



        ?>


    </script>


</body>

</html>