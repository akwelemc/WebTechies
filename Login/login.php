<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Log in</title>
</head>
<body>
    <form action="../action/login_action.php" class="form" id="login" style="background-color: rgba(255, 255, 255, 0.7);" method="post"> 
        <h1>Welcome To BusBoss</h1>
        <h3>Log in to continue..</h3>

        <div>
            <input name="email" type="text" id="email" placeholder="Email"/>
            <input type="password" id="password" name ="password" placeholder="Password"/>
        </div>

        <div class="func">
            <input type="checkbox" id="box">
            <label for="box">Remember me</label>
        </div>

        <div class="login">
            <button class="log" id ="button" type="submit" name="signInbtn">Log In</button>
        </div>


        <div class="register-section">
            <p>Don't have an account? <span><a href="../Login/rolepage.php">Register</a></span></p>
        </div>
        
    </form>
    <script src="../Js/login.js"></script>
    <script>
    <?php
    // Check the value of $_SESSION["booked"]
    if (isset($_SESSION["login"])) {
      // Check if it's a success or error
      $type = ($_SESSION["login"] === true) ? 'success' : 'error';

      // Get the message from $_SESSION["booked_created"]
      $message = $_SESSION["login_msg"];
      // Unset the session variables
      unset($_SESSION["login"]);
      unset($_SESSION["login_msg"]);
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
