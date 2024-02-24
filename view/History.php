<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../css/History.css">
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
                    
                    <h2>History</h2>
                </div>    
                <div class="user">
                    <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>      
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div> 

            <div class="table-container">
                <div><h3>History</h3></div>
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
                            <td>Bus 106</td>
                            <td>09:00 AM</td>
                            <td>01:00 PM</td>
                            <td>2024-02-18</td>
                            <td>Emily Davis</td>
                            <td>22</td>
                            <td>City Center to Suburbia</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 107</td>
                            <td>11:30 AM</td>
                            <td>03:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Matthew Wilson</td>
                            <td>18</td>
                            <td>Suburbia Loop</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 108</td>
                            <td>02:00 PM</td>
                            <td>06:00 PM</td>
                            <td>2024-02-18</td>
                            <td>Amy Martinez</td>
                            <td>26</td>
                            <td>Airport to City Center</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 109</td>
                            <td>10:00 AM</td>
                            <td>02:00 PM</td>
                            <td>2024-02-18</td>
                            <td>David Garcia</td>
                            <td>30</td>
                            <td>City Center to Beach</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 110</td>
                            <td>12:30 PM</td>
                            <td>04:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Laura Rodriguez</td>
                            <td>24</td>
                            <td>Suburbia to Mall</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 111</td>
                            <td>03:00 PM</td>
                            <td>07:00 PM</td>
                            <td>2024-02-18</td>
                            <td>Christopher Lee</td>
                            <td>20</td>
                            <td>Airport to Downtown</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 112</td>
                            <td>08:30 AM</td>
                            <td>12:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Olivia Taylor</td>
                            <td>28</td>
                            <td>Downtown Loop</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 113</td>
                            <td>01:30 PM</td>
                            <td>05:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Daniel Hernandez</td>
                            <td>32</td>
                            <td>Mall to City Center</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 114</td>
                            <td>09:30 AM</td>
                            <td>01:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Samantha Turner</td>
                            <td>19</td>
                            <td>City Center to Park</td>
                            <td>Scheduled</td>
                            <td><button>Edit</button></td>
                        </tr>
                        <tr>
                            <td>Bus 115</td>
                            <td>02:30 PM</td>
                            <td>06:30 PM</td>
                            <td>2024-02-18</td>
                            <td>Nathan Scott</td>
                            <td>23</td>
                            <td>Park to Suburbia</td>
                            <td>Scheduled</td>
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
</body>
</html>