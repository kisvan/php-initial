<?php
include("../dbconnect.php");
if (isset($_POST['jtitle'], $_SESSION['fyp_posterData'])) {

    $jtitle = mysqli_real_escape_string($conn, $_POST['jtitle']);
    $pcategory = mysqli_real_escape_string($conn, $_POST['pcategory']);
    $yexperiance = mysqli_real_escape_string($conn, $_POST['yexperiance']);
    $gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
    $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
    $edate = mysqli_real_escape_string($conn, $_POST['edate']);
    $jobsize = mysqli_real_escape_string($conn, $_POST['jobsize']);
    $jdescription = mysqli_real_escape_string($conn, $_POST['jdescription']);
    $employer = mysqli_real_escape_string($conn, $_POST['employer']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $elevel = mysqli_real_escape_string($conn, $_POST['elevel']);
    $sdate = date('Y-m-d H:i:s', strtotime($sdate));
    $edate = date('Y-m-d H:i:s', strtotime($edate));
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query = "UPDATE jobpost SET jobsize = '$jobsize', sdate = '$sdate', edate = '$edate', jtitle = '$jtitle',
    yexperience = '$yexperiance', gpa = '$gpa', pcategory = '$pcategory', jdescription = '$jdescription', elevel = '$elevel',
    employer = '$employer' WHERE postID = '$id'";

    $run = mysqli_query($conn, $query);

    if ($run) {
        $_SESSION['msg'] = '
                <div class="alert alert-success alert-dismissible fade show">
                    <button  onclick="window.location.reload()" type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Job Infomation Saved Successful
                </div>
            ';
        header('location:' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['msg'] = '
                <div class="alert alert-danger alert-dismissible fade show">
                    <button onclick="window.location.reload()" type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Fail!</strong> Fail To Save Job Information 
                </div>
            ';
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
} else {
    header("location:login.php");
}