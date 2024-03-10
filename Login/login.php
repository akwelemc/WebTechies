<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
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
</body>
</html>
