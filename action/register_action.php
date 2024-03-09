<?php
//the session global variable is used to return error messages 
// process of debigging: check all your variable names, try to print statements to find where the code breaks
// 
include "../settings/connection.php";

// echo"success";
if (isset($_POST["signUpbtn"])) {
  // Collecting inputs from user
  $fname = mysqli_real_escape_string($conn, $_POST['firstName']);
  $lname = mysqli_real_escape_string($conn, $_POST['lastName']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $telnum = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $passwordRetype = mysqli_real_escape_string($conn, $_POST['password2']);
  $user_role = mysqli_real_escape_string($conn, $_POST['userRole']);

  if ($password != $passwordRetype) {
    // add an alert that password isnt working
    $_SESSION["email_exists"] = "Password does not match";
    header("Location: ../Login/register.php");
    exit();
  }

  // Ensure that the user email is unique
  $check_email_query = "SELECT * FROM People WHERE email = '$email'";
  $check_email_result = mysqli_query($conn, $check_email_query);

  // echo "User:".$user_role;
  // exit(); 


  if (mysqli_num_rows($check_email_result) > 0) {
    $_SESSION["email_exists"] = "Account with this email already exists";
    header("Location: ../Login/register.php");
    // echo "email fail";
    exit();
  }

  // Hash password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);


  $insert_person_query = "INSERT INTO People(role_id, fname, lname, dob, email, telnumber,gender,  passwrd) VALUES ('$user_role', '$fname', '$lname', '$dob','$email', '$telnum','$gender', '$hashed_password')";
  // echo $insert_person_query;
  if (mysqli_query($conn, $insert_person_query)) {
    // Successful registration
    $_SESSION["account_created"] = true;
    header("Location: ../Login/login.php");
    echo "success";
    exit();
  } else {
    // Registration failed
    $_SESSION["account_created"] = "Error creating account. Please try again.";
    header("Location: ../Login/register.php");
    echo "failed";
    $conn->close();
    exit();
  }
} else {
  $_SESSION["account_created"] = "Error creating account. Please try again.";
  header("Location: ../Login/register.php");
  $conn->close();
  exit();
}

