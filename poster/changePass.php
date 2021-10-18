<?php
    include("../dbconnect.php");
    if(isset($_POST, $_SESSION['fyp_posterData'])){
        $oldPassword = mysqli_real_escape_string($conn,$_POST['oldPassword']);
        $newPassword = mysqli_real_escape_string($conn,$_POST['newPassword']);
        $confirm_Password = mysqli_real_escape_string($conn,$_POST['confirm_password']);

    
        if($newPassword == $confirm_Password){
            $newPassword = md5($newPassword);
            $oldPassword = md5($oldPassword);
            if($oldPassword == $_SESSION['fyp_posterData']['password']){
                $email = $_SESSION['fyp_posterData']['email'];
                $query = "UPDATE `users` SET password = '$newPassword'  WHERE email = '$email' ";
                $run = mysqli_query($conn, $query);
                if($run){
                    $_SESSION['msg'] = '
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" onclick="window.location.reload()" class="close" data-dismiss="alert">&times;</button>
                            <strong>Success!</strong> password changed successfull
                        </div>
                    ';
                    $_SESSION['fyp_posterData']['password'] = $newPassword;
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }else{
                    $_SESSION['msg'] = '
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" onclick="window.location.reload()" data-dismiss="alert">&times;</button>
                            <strong>Fail!</strong> Failed To Change Password. Please Try Again Later
                        </div>
                    ';
                    header('location:'.$_SERVER['HTTP_REFERER']);
                }

            }else{
                $_SESSION['msg'] = '
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" onclick="window.location.reload()" data-dismiss="alert">&times;</button>
                        <strong>Process fail!</strong> Please Enter Correct Current Password
                    </div>
                ';
                header('location:'.$_SERVER['HTTP_REFERER']);
            }


        }else{
            $_SESSION['msg'] = '
                <div class="alert alert-warning alert-dismissible fade show">
                    <button type="button" class="close" onclick="window.location.reload()" data-dismiss="alert">&times;</button>
                    <strong>warning!</strong> Your Password Not Match
                </div>
            ';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
          
    }else{
        header("location:login.php");
    }


?>

