
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../css/History.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="../view/UserDashboard.php" class="logo">
                    <img src="../images/Bus.png" alt="">
                    <span class="nav-item">BusBoss</span>
                </a>
            </li>
            <li>
                <a href="../view/UserDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="../view/Profile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="../view/History.php">
                    <i class="fas fa-history"></i>
                    <span class="nav-item">History</span>
                </a>
            </li>
            <li>
                <a href="../view/Maps.php">
                    <i class="fas fa-map"></i>
                    <span class="nav-item">Maps</span>
                </a>
            </li>
            <li>
                <a href="../view/bookingpage.php">
                    <i class="fas fa-book"></i>
                    <span class="nav-item">Booking</span>
                </a>
            </li>
            <li>
                <a href="../view/help.php">
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

                <h2>History</h2>
            </div>
            <div class="user">
                <!-- <div class="search-box">
                    <i class="fa-solid fa-search"> </i>
                    <input type="text" placeholder="Search" />
                </div> -->
                <img src="../images/profile.jpg" alt="">
            </div>
        </div>

        <div class="table-container">
            <div>
                <h3>History</h3>
            </div>
            <table>
                <thead>

                    <tr>
                        <th>Bus Number</th>
                        <th>Departure Time</th>
                        <th>Trip Date</th>
                        <th>Stop Name</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../function/display_tripDetails.php");
                    ?>
                </tbody>
            </table>
        </div>
        <script>
            <?php
            // Check the value of $_SESSION["booked"]
            if (isset($_SESSION["booking_deleted"])) {
                // Check if it's a success or error
                $type = ($_SESSION["booking_deleted"] === true) ? 'success' : 'error';

                // Get the message from $_SESSION["booked_created"]
                $message = $_SESSION["booking_Deletedmsg"];
                // Unset the session variables
                unset($_SESSION["booking_deleted"]);
                unset($_SESSION["booking_Deletedmsg"]);
                // Output JavaScript code to show the alert
                echo "showAlert('$message', '$type');";
            }
            if (isset($_SESSION["update"])) {
                // Check if it's a success or error
                $type = ($_SESSION["update"] === true) ? 'success' : 'error';

                // Get the message f
                $message = $_SESSION["booking_updated"];
                // Unset the session variables
                unset($_SESSION["update"]);
                unset($_SESSION["booking_updated"]);
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
</body>

</html>