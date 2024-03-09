<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
  <link rel="stylesheet" href="../css/style.css">
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
            <li class="active" >
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
            <h2>Bookings</h2>
          </div>    
          <div class="user">
              <div class="search-box">
                  <i class="fa-solid fa-search"> </i>    
                  <input type="text" placeholder="Search"/>
              </div>      
              <img src="../images/profile.jpg" alt=""> 
          </div>    
      </div> 

      <section class="available-buses">
        <form id="booking-form" onsubmit="return validateDate()">
          <div>
            <label for="departure-date">Departure Date:</label>
            <input type="date" id="departure-date" name="departure-date" required>
          </div>

          <div id="bus-list" class="bus-list">
            <h4>Available buses</h4>
            <div class="bus">
              <div>
                Route: Kwabenya<br>Destination: Atomic<br>Friday: 3:00pm
              </div>
              <button class="buslist">Select</button>
            </div>
          
            <div class="bus">
              <div>
                Route: Aburi<br>Destination: Accra Mall<br>Friday: 4:00pm
              </div>
              <button class="buslist">Select</button>
            </div>
          
            <div class="bus">
              <div>
                Route: Aburi<br>Pick-up: Madina Bus Stop<br>Sunday: 2:00pm
              </div>
              <button class="buslist">Select</button>
            </div>
          
            <div class="bus">
              <div>
                Route: Kwabenya<br>Pick-up: Dome Filling Station<br>Sunday: 1:00pm
              </div>
              <button class="buslist">Select</button>
            </div>
          
            <div>
              <button class="submitform" type="submit">Submit Booking</button>
            </div>
          </div>
        </form>
      </section>
    </div>

    <script>
      function validateDate(){
        var selectedDate = new Date(document.getElementById("departure-date").value);

        if(selectedDate.getDay()==5 || selectedDate.getDay() == 0){
          return true;
        }
        else{
          alert("Sorry, bus bookings are only allowed on Fridays and Sundays!");
          return false;
        }
      }
    </script>
</body>
</html>
