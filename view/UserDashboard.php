<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
            <li >
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
                <a href="../view/settings.php">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
            </li>
            <li>
                <a href="../view/help.php">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                </a>
            </li>
            <li>
                <a href="../view/login.php" class="logout">
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
                    <input type="text" placeholder="Search"/>
                </div>      
                <img src="../images/profile.jpg" alt=""> 
            </div>    
        </div>    
        <div class="middlebar" >
            <div class="box">
                <div id="progressCard" class="outter-card" > 
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
            <div><h3>Recent History</h3></div>
            <table>
                <thead>
                    <tr>
                        <th>Bus Number</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th>Trip Date</th>
                        <th>Driver</th>
                        <th>Passenger Count</th>
                        <th>Route</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bus 101</td>
                        <td>08:00 AM</td>
                        <td>12:00 PM</td>
                        <td>2024-02-18</td>
                        <td>John Doe</td>
                        <td>30</td>
                        <td>City Center to Suburbia</td>
                        <td>In Progress</td>
                        <td><button>Edit</button></td>
                    </tr>
                    <tr>
                        <td>Bus 102</td>
                        <td>10:30 AM</td>
                        <td>02:30 PM</td>
                        <td>2024-02-18</td>
                        <td>Jane Smith</td>
                        <td>25</td>
                        <td>Suburbia to City Center</td>
                        <td>In Progress</td>
                        <td><button>Edit</button></td>
                    </tr>
                    <tr>
                        <td>Bus 103</td>
                        <td>01:00 PM</td>
                        <td>05:00 PM</td>
                        <td>2024-02-18</td>
                        <td>Michael Johnson</td>
                        <td>20</td>
                        <td>City Center Loop</td>
                        <td>In Progress</td>
                        <td><button>Edit</button></td>
                    </tr>
                    <tr>
                        <td>Bus 104</td>
                        <td>11:00 AM</td>
                        <td>03:00 PM</td>
                        <td>2024-02-18</td>
                        <td>Sarah Brown</td>
                        <td>35</td>
                        <td>City Center to Airport</td>
                        <td>In Progress</td>
                        <td><button>Edit</button></td>
                    </tr>
                    <tr>
                        <td>Bus 105</td>
                        <td>03:30 PM</td>
                        <td>07:30 PM</td>
                        <td>2024-02-18</td>
                        <td>Robert Green</td>
                        <td>28</td>
                        <td>Suburbia to Airport</td>
                        <td>In Progress</td>
                        <td><button>Edit</button></td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>   
</body>
</html>
