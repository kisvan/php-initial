<?php
include("../dbconnect.php");
if (isset($_POST, $_SESSION['fyp_userData'])) {
    $start_year = mysqli_real_escape_string($conn, $_POST['start_year']);
    $end_year = mysqli_real_escape_string($conn, $_POST['end_year']);
    $gpa = mysqli_real_escape_string($conn, $_POST["gpa"]);
    $division = mysqli_real_escape_string($conn, $_POST["division"]);
    $elevel = mysqli_real_escape_string($conn, $_POST["elevel"]);
    $pcategory = mysqli_real_escape_string($conn, $_POST["pcategory"]);
    $user = $_SESSION['user_id'];

    $check_year = mysqli_query($conn, "SELECT sdate, edate FROM education_level 
        WHERE sdate = '$start_year' 
        AND edate = '$end_year' 
        AND userID = '$user'");

    $count_year = mysqli_num_rows($check_year);

    if ($count_year > 0) {
        $_SESSION['error']  = "Year registered";
        header("location:academic.php");
    }
    //ELSE INSERT 
    else {

        /* $division removed */
        $insert_elevel = mysqli_query($conn, "INSERT INTO education_level 
        VALUES(NULL, '$user', '$elevel', '$pcategory', '$gpa', '$start_year', '$end_year') ");

        if ($insert_elevel) {
            $_SESSION['msg'] = '
            <div class="alert alert-success alert-dismissible fade show">
                <button  onclick="window.location.reload()" type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> Education Infomation Saved Successful
            </div>
        ';
            header("location:academic.php");
        } else {
            $_SESSION['msg'] = '
            <div class="alert alert-danger alert-dismissible fade show">
                <button onclick="window.location.reload()" type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Fail!</strong> Something went Wrong Try again
            </div>
        ';
            header("location:academic.php");
        }
    }
} else {
    header("location:login.php");
}