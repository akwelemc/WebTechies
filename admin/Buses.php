<?php
session_start();
// session_abort();
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
            <li class="active" >
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

                <h2><img src="../images/bus10.jpg" alt="bus" style=" width:120px;height:120px">BUS INFO</h2>
            </div>
            <div class="user">
                <img src="../images/defaultprofile3.png" alt="">
            </div>
        </div>


        <div id="addBusModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addBusModal')">&times;</span>
                <h2 style="color: black;">Add Bus</h2>
                <form id="addBusForm" method="post" action="../action/addBus.php">
                    <label for="busName">Bus Name:</label>
                    <input type="text" id="busName" name="busName" required>
                    <label for="capacity">Capacity:</label>
                    <input type="number" id="capacity" name="capacity" required>
                    <label for="regNumber">Registration Number:</label>
                    <input type="text" id="regNumber" name="regNumber" required>
                    <label for="route">Route:</label>
                    <select id="route" name="route" required>
                        <option disabled selected value="0">Choose a route</option>
                        <?php
                        include_once("../action/get_routes.php");
                        $results = getRoute();

                        foreach ($results as $result) {
                            echo "<option value = '{$result['route_id']}'>{$result['route']}</option>";
                        }

                        ?>
                    </select>


                    <button type="submit">Add Bus</button>
                </form>
            </div>
        </div>



        <div class="table-container">
            <div>
                <h3 class="main-title"><a href="#" id="addBus">Add Bus</a></h3>
                
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
                    <?php
                    include("../action/getAllBusses.php");
                    ?>
                </tbody>
            </table>
        </div>
    </div>




    <script>
        <?php
        // Check the value of $_SESSION["booked"]
        if (isset($_SESSION["bus_added"])) {
            // Check if it's a success or error
            $type = ($_SESSION["bus_added"] === true) ? 'success' : 'error';

            // Get the message from $_SESSION["booked_created"]
            $message = $_SESSION["bus_msg"];
            // Unset the session variables
            unset($_SESSION["bus_added"]);
            unset($_SESSION["bus_msg"]);
            // Output JavaScript code to show the alert
            echo "showAlert('$message', '$type');";
        }
        // if (isset($_SESSION["bus_stop_added"])) {
        //     // Check if it's a success or error
        //     $type = ($_SESSION["bus_stop_added"] === true) ? 'success' : 'error';

        //     // Get the message f
        //     $message = $_SESSION["bus_stop_message"];
        //     // Unset the session variables
        //     unset($_SESSION["bus_stop_added"]);
        //     unset($_SESSION["bus_stop_message"]);
        //     echo "showAlert('$message', '$type');";
        // }
        if (isset($_SESSION["bus_deleted"])) {
            // Check if it's a success or error
            $type = ($_SESSION["bus_deleted"] === true) ? 'success' : 'error';

            // Get the message f
            $message = $_SESSION["bus_message"];
            // Unset the session variables
            unset($_SESSION["bus_deleted"]);
            unset($_SESSION["bus_message"]);
            echo "showAlert('$message', '$type');";
        }
        if (isset($_SESSION["bus_updated"])) {
            // Check if it's a success or error
            $type = ($_SESSION["bus_updated"] === true) ? 'success' : 'error';

            // Get the message f
            $message = $_SESSION["bus_message"];
            // Unset the session variables
            unset($_SESSION["bus_updated"]);
            unset($_SESSION["bus_msg"]);
            echo "showAlert('$message', '$type');";
        }

        ?>
        function showAlert(message, type) {
            Swal.fire({
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 2000
            });

        }
    </script>    
    <script src="../js/Buses.js"></script>

</body>

</html>