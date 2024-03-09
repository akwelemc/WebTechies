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
                <div class="search-box">
                    <i class="fa-solid fa-search"> </i>
                    <input type="text" placeholder="Search" />
                </div>
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
                            <span class="stat-value">
                                20
                            </span>
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
                            <span class="stat-value">
                                5
                            </span>
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
                            <span class="stat-value">
                                15
                            </span>
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
    </div>
</body>

</html>