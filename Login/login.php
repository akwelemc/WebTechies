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
            <input type="password" id="password" placeholder="Password"/>
        </div>

        <div class="func">
            <input type="checkbox" id="box">
            <label for="box">Remember me</label>
            <a href="url" class="link">Forgot password?</a>
        </div>

        <div class="login">
            <button class="log" id ="button" type="submit" name="signInbtn">Log In</button>
        </div>

        <div class="next"></div>
            <div class="line"></div>
            <div class="text">
                <span>Login via</span>
            </div>
        </div>

        <div class="imggogle">
            <button class="google"><img src="../images/google.png" width="30" height="30" align="center"> Continue with Google</button>
            <button class="google"><img src="../images/Facebook.png" width="30" height="30" align="center" class="fblogo"> Continue with Facebook</button>
        </div>

        <div class="register-section">
            <p>Don't have an account? <span><a href="../view/Register.php">Register</a></span></p>
        </div>
        
    </form>
    <script src="../js/login.js"></script>
</body>
</html>
