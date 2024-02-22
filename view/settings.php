<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../css/settings.css">
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
            <li>
                <a href="../view/UserDashboard.html">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a>
            </li>
            <li>
                <a href="../view/Profile.html">
                    <i class="fas fa-user"></i>
                    <span class="nav-item">Profile</span>
                </a>
            </li>
            <li >
                <a href="../view/History.html">
                    <i class="fas fa-history"></i>
                    <span class="nav-item">History</span>
                </a>
            </li>
            <li>
                <a href="../view/Maps.html">
                    <i class="fas fa-map"></i>
                    <span class="nav-item">Maps</span>
                </a>
            </li>
            <li   class="active">
                <a href="../view/settings.html">
                    <i class="fas fa-cog"></i>
                    <span class="nav-item">Settings</span>
                </a>
            </li>
            <li>
                <a href="../view/help.html">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-item">Help</span>
                </a>
            </li>
            <li>
                <a href="../view/login.html" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Log out</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="main">
        <div class="firstbar">
            <div class="head-title">
                
                <h2>Settings</h2>
            </div>    
            <div class="user">
                <div class="search-box">
                    <i class="fa-solid fa-search"> </i>    
                    <input type="text" placeholder="Search"/>
                </div>      
                <img src="../images/profile.jpg" alt=""> 
            </div>    
        </div> 

        <div id="settings-page">
            <div class="settings-header">
            </div>

            <!-- Option to choose password, email, or username -->
           
            <!-- Option to choose password, email, or username -->
            <!-- Option to choose password, email, or username -->
            <div class="options">
                <div>
                    <p>Change your password here:</p>
                    <button id="change-password-btn">Change Password</button>
                </div>
                <div>
                    <p>Update your email address:</p>
                    <button id="change-email-btn">Change Email</button>
                </div>
                <div>
                    <p>Modify your username:</p>
                    <button id="change-username-btn">Change Username</button>
                </div>
            </div>

            <!-- Password change form -->
            <form class="settings-form password-form" action="#" method="POST">
                <div class="form-group">
                    <label for="current-password">Current Password:</label>
                    <input type="password" id="current-password" name="current-password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-new-password">Confirm New Password:</label>
                    <input type="password" id="confirm-new-password" name="confirm-new-password" required>
                </div>
                <button type="submit">Save Changes</button>
            </form>

            <!-- Email change form -->
            <form class="settings-form email-form" action="#" method="POST">
                <div class="form-group">
                    <label for="new-email">New Email:</label>
                    <input type="email" id="new-email" name="new-email" required>
                </div>
                <button type="submit">Save Changes</button>
            </form>

            <!-- Username change form -->
            <form class="settings-form username-form" action="#" method="POST">
                <div class="form-group">
                    <label for="new-username">New Username:</label>
                    <input type="text" id="new-username" name="new-username" required>
                </div>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to toggle form visibility based on button clicks
        const passwordBtn = document.getElementById('change-password-btn');
        const emailBtn = document.getElementById('change-email-btn');
        const usernameBtn = document.getElementById('change-username-btn');

        const passwordForm = document.querySelector('.password-form');
        const emailForm = document.querySelector('.email-form');
        const usernameForm = document.querySelector('.username-form');

        passwordBtn.addEventListener('click', function() {
            passwordForm.classList.toggle('show-form');
            emailForm.classList.remove('show-form');
            usernameForm.classList.remove('show-form');
        });

        emailBtn.addEventListener('click', function() {
            passwordForm.classList.remove('show-form');
            emailForm.classList.toggle('show-form');
            usernameForm.classList.remove('show-form');
        });

        usernameBtn.addEventListener('click', function() {
            passwordForm.classList.remove('show-form');
            emailForm.classList.remove('show-form');
            usernameForm.classList.toggle('show-form');
        });
    </script>
</body>
</html>