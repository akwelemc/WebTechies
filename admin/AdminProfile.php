<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminProfile</title>
    <link rel="stylesheet" href="../css/Profile.css">
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
                    
                    <h2>Profile</h2>
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
                        <?php
                        include("../function/get_user_profile.php");
                        ?>
                        <!-- <p><strong>Name:</strong> John Doe</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Date of Birth:</strong> January 1, 1990</p>
                        <p><strong>Bio:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget turpis non justo suscipit consectetur.</p> -->
                    </div>
                </div>
                <div class="profile-actions">
                    <button class="Edit" id="Edit">Edit Profile</button>
                    <button class = "ChangePassword" id="ChangePassword">Change Password</button>
                    <form method="" action ="../Login/logout.php"><button type ="submit" class = "Logout">Log Out</button></form>
                </div>
            </div>

            <div id="editProfileModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('editProfileModal')">&times;</span>
                    <form id="editProfileForm" method="post">
                        <label for="bio">Bio:</label>
                        <textarea id="bio" name="bio"></textarea>
                        <label for="username">Change Username:</label>
                        <input type="text" id="username" name="username">
                        <label for="email">Change Email:</label>
                        <input type="text" id="email" name="email">
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>

            <div id="changePasswordModal" class="Password_modal">
                <div class="password-modal-content">
                    <span class="close" onclick="closeModal('changePasswordModal')">&times;</span>
                    <form id="changePasswordForm" method="post">
                        <label for="currentPassword">Current Password:</label>
                        <input type="password" id="currentPassword" name="currentPassword">
                        <label for="newPassword">New Password:</label>
                        <input type="password" id="newPassword" name="newPassword">
                        <label for="confirmPassword">Confirm New Password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword">
                        <input type="submit" value="Save">
                    </form>
                </div>
            </div>




            

        </div>



    <script src="../js/Profile.js"></script>
    </body> 
</html>    