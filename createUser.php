<?php
include("dbconnect.php");

if (isset($_POST['email'], $_POST['fName'], $_POST['lName'], $_POST['gender'], $_POST['password'], $_POST['contact'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $password = md5($password);

    $sql = "INSERT INTO users(fName,lName,contact,email,gender,password,yexperiance,user_type) VALUES('$fName', '$lName', '$contact', '$email','$gender', '$password', 0, 'USER'); ";
    $run = mysqli_query($conn, $sql);

    if ($run) {

        $sql_login = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password';";
        $run_login = mysqli_query($conn, $sql_login);
        $row = mysqli_num_rows($run_login);

        if ($row > 0) {

            $userData = mysqli_fetch_assoc($run_login);

            // if request user is normal user
            if ($userData['user_type'] == 'USER') {
                $_SESSION['user_id'] = $userData['userID'];
                $_SESSION['fyp_userData'] = $userData;
                header("location:user/dashboard.php");
            }
            //if request usser is a poster 
            elseif ($userData['user_type'] == 'POSTER') {
                $_SESSION['fyp_posterData'] = $userData;
                header("location:poster/poster.php");
            }
        }
    } else {
        $_SESSION['msg']['status'] = 'fail';
        $_SESSION['msg']['data'] = "
            <div class='form-group'>
                <div style='width:90%; min-height:30px; color:white; text-align:center;padding:4px; margin:auto; background-color:rgba(150,0,0,0.5); margin-bottom:10px;'><strong>Regitration Failed</strong> Try With Other Email</div>
            </div>
        ";
        header("location:registration.php");
    }
} else {
    header("location:registration.php");
}