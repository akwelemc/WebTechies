<?php
session_start();
include('../settings/connection.php');

if (isset($_POST['signInbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // checking if email exists
    $get_user = $conn->prepare('SELECT * FROM people WHERE email = ?');
    $get_user->bind_param('s', $email);
    $get_user->execute();
    $result = $get_user->get_result();

    if ($result->num_rows > 0) {
        $result = $result->fetch_assoc();
        // var_dump($result);
        // exit();
        if (password_verify($password, $result['passwrd'])) {
            // echo'hii';
            // exit();
            $_SESSION['user_id'] = $result['pid'];
            $_SESSION['user_fname'] = $result['fname'];
            $_SESSION['user_lname'] = $result['lname'];
            $_SESSION['role_id'] = $result['role_id'];
            if ($_SESSION['role_id'] == 2 ||$_SESSION['role_id'] == 1 ) {
                header('Location: ../admin/AdminDashboard.php');
                $conn->close();
                exit();
            }
            // echo'hii2';
            // exit();
            header('Location: ../view/UserDashboard.php');
            $conn->close();
            exit();
        } else {
            $_SESSION["login_msg"] = "Password incorrect";
            $_SESSION['login']= false;
            header('Location: ../Login/login.php');
            $conn->close();
            exit();
        }
    } else {
        $_SESSION["login_msg"] = "Account doesn't exist";
        $_SESSION['login']= false;
        header('Location: ../Login/login.php');
        $conn->close();
        exit();
    }
} else {
    // redirect to login
    $_SESSION["login_msg"] = "Unable to log in";
    $_SESSION['login']= false;
    header('Location: ../Login/login.php');
    $conn->close();
    exit();
}
