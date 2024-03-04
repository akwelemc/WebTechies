<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminProfile</title>
    <link rel="stylesheet" href="../admin/AdminProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="../images/Bus.png" alt="">
                    <span class="nav-item">BusBoss</span>
                </a>
            </li>
            <li >
                <a href="../admin/AdminDashboard.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li class="active">
                <a href="../admin/AdminProfile.php">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li>
                <a href="../admin/Analytics.php">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-item">Analytics</span>
                </a>
            </li>
            <li>
                <a href="../admin/Adminsettings.php">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
            </li>
            <li>
                <a href="../admin/AdminHelp.php">
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
                    
                    <h2>AdminProfile</h2>
                </div>    
                <div class="user">
                    <div class="search-box">
                        <i class="fa-solid fa-search"> </i>    
                        <input type="text" placeholder="Search"/>
                    </div>      
                    <img src="../images/profile.jpg" alt=""> 
                </div>    
            </div> 

            <div id="profile-page">
                <div class="profile-header">
                    <h1>Admin Profile</h1>
                </div>
                <div class="profile-info">
                    <img src="../images/profile.jpg" alt="Profile Picture">
                    <div class="user-details">
                        <p><strong>Name:</strong> John Doe</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Date of Birth:</strong> January 1, 1990</p>
                        <p><strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis non justo suscipit consectetur.</p>
                    </div>
                </div>
                <div class="profile-actions">
                    <button>Edit Profile</button>
                    <button>Change Password</button>
                    <button>Log Out</button>
                </div>
            </div>
        </div>
    </body> 
</html>    