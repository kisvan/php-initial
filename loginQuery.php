<?php
include("dbconnect.php");
if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = md5($password);

    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password';";
    $run = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($run);

    if ($row > 0) {

        $userData = mysqli_fetch_assoc($run);

        if ($userData['user_type'] == 'USER') {
            $_SESSION['fyp_userData'] = $userData;
            $_SESSION['user_id'] = $userData['userID'];
            $_SESSION['exprience'] = $userData['yexperiance'];
            header("location:user/dashboard.php");
        }
        //if request usser is a poster 
        elseif ($userData['user_type'] == 'POSTER') {
            $_SESSION['fyp_posterData'] = $userData;
            $_SESSION['user_id'] = $userData['userID'];
            header("location:poster/poster.php");
        }
    } else {
        $_SESSION['msg'] = "<div style='width:90%; min-height:30px; color:white; text-align:center;padding:4px; margin:auto; background-color:rgba(150,0,0,0.5); margin-bottom:10px;'>incorrect email or password</div>";
        header("location:login.php");
    }
} else {
    header("location:login.php");
}