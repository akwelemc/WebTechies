<?php
include("../action/get_history.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
            <li class="active">
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
            <li>
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
                <!-- <form action="../Login/logout.php" name="logout_btn">
                <button class="logout-btn">Log Out</button>
                <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>    
            </form> -->
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
                    <input type="text" placeholder="Search" />
                </div> -->
                <img src="../images/profile.jpg" alt="">
            </div>
        </div>
        <div class="middlebar">
            <div class="box">
                <div id="progressCard" class="outter-card">
                    <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Total Rides
                            </span>
                            <?php 
                            include("../action/get_total_number_bookings.php");
                            $result = getTotalBookings();
                            echo '<span class="stat-value">'
                                .$result.
                            '</span>';
                            ?>
                        </div>
                        <i class="fas fa-spinner icon" aria-hidden="true"></i>
                        </i>
                    </div>
                </div>


                <div id="incompleteCard" class="outter-card">
                    <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Cancelled Rides
                            </span>
                            <?php
                            include("../function/get_cancelled_bookings_fxn.php");
                            ?>
                            <!-- 
                            <span class="stat-value">
                                5
                            </span> -->
                        </div>
                        <i class="fa fa-times-circle icon">
                        </i>
                    </div>

                </div>

                <div id="completedCard" class="outter-card">
                    <div class="stat-icon">
                        <div class="stat">
                            <span class="title">
                                Completed Rides
                            </span>
                            <?php 
                            include("../action/get_total_completed_bookings.php");
                            $result = getTotalCompletedBookings();
                            echo '<span class="stat-value">'
                                .$result.
                            '</span>';
                            ?>
                        </div>
                        <i class="fas fa-check icon">
                        </i>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-container">
            <div>
                <h3>Recent History</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Bus Number</th>
                        <th>Departure Time</th>
                        <th>Trip Date</th>
                        <th>Bus Stop</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $results = getTripDetails();

                    $count = 0;
                    foreach ($results as $result) {
                        if ($count >= 5) {
                            break;
                        }

                        echo '
                        <tr>
                            <td>' . $result['bid'] . '</td>
                            <td>' . $result['time'] . '</td>
                            <td>' . $result['date_booked'] . '</td>
                            <td>' . $result['stopName'] . '</td>
                            <td>' . $result['status_name'] . '</td>

                            <td>
                                <a style="color: #e74c3c;" class="delete_icon" href="../action/delete_booking.php?bookingId=' . $result['bookingId'] . '">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                                <a style="color: #e74c3c;" class="edit_icon" href="../view/edit_booking.php?bookingIdd=' . $result['bookingId'] . '">
                                    <i class="fa-solid fa-pen-to-square"></i> 
                                </a> 
                            </td>
                        </tr>';
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>