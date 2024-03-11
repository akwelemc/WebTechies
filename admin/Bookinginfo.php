<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminProfile</title>
    <link rel="stylesheet" href="../css/Profile.css">
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <script src="sweetalert.min.js"></script>
    
</head>
<body>
<nav>
        <ul>
            <li>
                <a href="../admin/AdminDashboard.php" class="logo">
                    <img src="../images/Bus.png" alt="">
                    <span class="nav-item">BusBoss</span>
                </a>
            </li>
            <li>
                <a href="../admin/AdminDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="../admin/AdminProfile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li class="active" >
              <a href="../admin/bookinginfo.php">
                  <i class="fas fa-book"></i>
                  <span class="nav-item">Booking Info</span>
              </a>
            </li>
            <li>
                <a href="../admin/AdminHelp.php">
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
                    
                    <h2>Passengers Info</h2>
                </div>    
                <div class="user">
                    <!-- <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>       -->
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div> 


            <div class="table-container" style="width: 85%;">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Destination</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php include('../action/getbookingInfo_action.php'); ?>
                    </tbody>
                </table> 
            </div>
        </div>
    



    <script src="../js/Profile.js"></script>
    </body> 
</html>    