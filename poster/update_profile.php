<?php
    include("../dbconnect.php");
    if(isset($_POST, $_SESSION['fyp_posterData'])){
        $keys = array_keys($_POST);
        $data = '';
        $value = '';
        $count = 1;
        $comma = ', ';
        foreach($keys as $key){
            if($count == count($keys) ){
                $comma='';
            }
            $data .= $key."= '". mysqli_real_escape_string($conn,$_POST[$key]) ."'".$comma;
            $count++;
        }
        $email = $_SESSION['fyp_posterData']['email'];
        $query = "UPDATE `users` SET $data  WHERE email = '$email' ";
       // echo $query;

        $run = mysqli_query($conn, $query);
        
        if($run){
            $_SESSION['msg'] = '
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" class="close" onclick="window.location.reload()" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Data Saved Successfull
                </div>
            ';
            $sql = "SELECT * FROM `users` WHERE `email` = '$email';";
            $run_user = mysqli_query($conn, $sql);
            $_SESSION['fyp_posterData'] = mysqli_fetch_assoc($run_user);

            header('location:'.$_SERVER['HTTP_REFERER']);

        }else{
            $_SESSION['msg'] = '
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" onclick="window.location.reload()" data-dismiss="alert">&times;</button>
                    <strong>Fail!</strong> Failed To Save Changes
                </div>
            ';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        
        

    }else{
        header("location:login.php");
    }


?>

