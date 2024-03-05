<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/Register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="../action/register_action.php" id="register" class="form" style="background-color: rgba(255, 255, 255, 0.5);" method="post">
        <h1>Welcome To BusBoss</h1>
        <h3>Register To continue...</h3>
        <div>
            <div class="first">
                <input type="text" id="firstName" name="firstName" placeholder="First name" required/>
                <input type="text" id="lastName" name="lastName" placeholder="Last name" required/>
            </div>
            <div class="check">
                <div>
                    <input type="radio" id="male" name="gender" value="0" required>
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="1" required>
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="third">
                <div>
                    <label for="userRole">Role:</label>
                    <select id="userRole" name="userRole" required>
                    <option disabled selected value="0">Choose a role</option>
                        <option value=2>Driver</option>
                        <option value=3>Passenger</option>
                        <option value=1>Super Admin</option>
                    </select>
                </div>
                
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
            </div>
            <div class="phone">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
            </div>
            <div>
                <input type="text" id="email" name="email" placeholder="Email" required/>
                <input type="password" id="password" name="password" placeholder="Password" required/>
                <input type="password" id="password2" name="password2" placeholder="Confirm Password" required/>
            </div>
            <div class="login">
            <button type="submit" class="signUpbtn" id="signUpbtn" name="signUpbtn">Register</button>
               <!-- <a href="../view/UserDashboard.php" id="submitBtn" class="log">Register</a> -->
            </div>
            <div class="next">
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
                <p>Already with an Account? <span><a href="../Login/login.php">Log in</a></span></p>
            </div> 

        </div>
    </form>

    <script src="../js/Register.js"></script>
</body>
</html>
