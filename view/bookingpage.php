<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bookings</title>
  <link rel="stylesheet" href="../css/style.css">
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
      <li class="active">
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
          <input type="text" placeholder="Search" />
        </div>
        <img src="../images/profile.jpg" alt="">
      </div>
    </div>


    <section class="available-buses">
      <form id="booking-form" name="booking" method="POST" , action="../action/booking_action.php">
        <div>
          <label for="departure-date">Departure Date:</label>
          <input type="date" id="departure-date" name="date" required>
        </div>

        <div id="bus-list" class="bus-list">
          <h4>Available buses</h4>
          <div class="bus">
            <div>
              <p>Time</p>
              <select id="time" name="time" required>
                <option disabled selected value="0">Choose a time</option>
                <?php
                include("../action/get_time_slots.php");

                $results = getTimes();
                foreach ($results as $time) {
                  echo "<option value='{$time['slotID']}'>{$time['time']}</option>";
                } ?>
              </select>
            </div>
            <!-- <button class="buslist">Select</button> -->
          </div>

          <div class="bus">
            <div>
              <p>Bus stop</p>
              <select id="stops" name="stops" required>
                <option disabled selected value="0">Choose a bus stop</option>
                <?php
                include("../action/get_busStops.php");

                $results = getBusStop();
                // var_dump($results);
                foreach ($results as $stops) {
                  echo "<option value='{$stops['bsid']}'>{$stops['stopName']}</option>";
                }
                // echo "yes";
                ?>
              </select>
              <!-- Route: Aburi<br>Destination: Accra Mall<br>Friday: 4:00pm -->
            </div>
            <!-- <button class="buslist">Select</button> -->
          </div>

          <div>
            <button name="bookingBtn" class="submitform" type="submit">Submit Booking</button>
          </div>
        </div>
      </form>
    </section>
  </div>
  <script>
    <?php
    // Check the value of $_SESSION["booked"]
    if (isset($_SESSION["booked"])) {
      // Check if it's a success or error
      $type = ($_SESSION["booked"] === true) ? 'success' : 'error';

      // Get the message from $_SESSION["booked_created"]
      $message = $_SESSION["booking_created"];
      // Unset the session variables
      unset($_SESSION["booked"]);
      unset($_SESSION["booking_created"]);
      // Output JavaScript code to show the alert
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