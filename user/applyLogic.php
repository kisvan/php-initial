<?php
include("../dbconnect.php");

if (isset($_POST['apply'])) {
    //get data for rideriction
    $point = mysqli_real_escape_string($conn, $_POST['point']);
    $min_gpa = mysqli_real_escape_string($conn, $_POST['min_gpa']);

    $user = $_SESSION['user_id'];
    $job = mysqli_real_escape_string($conn, $_POST['job']);
    $elevel = mysqli_real_escape_string($conn, $_POST['elevel']);
    $gpa = mysqli_real_escape_string($conn, $_POST['gpa']);
    $experence = mysqli_real_escape_string($conn, $_POST['txyear']);

    $check_applicant = mysqli_query($conn, "SELECT * FROM applicants 
    WHERE job = $job AND  applicant = $user ");

    $count_applicant = mysqli_num_rows($check_applicant);

    if ($experence > 25 || $experence < 1) {

        $_SESSION['error'] = "Required experence is 1 up to 25 only";
        header("location:apply.php?job=$job");
        //
    } elseif ($gpa < 2 || $gpa > 5) {

        $_SESSION['error'] = "GPA range from 2.0 to 5.0 only";
        header("location:apply.php?job=$job");
        //
    } else {

        if ($count_applicant >= 1) {

            $_SESSION['error'] = "You Cant apply this job two times";
            header("location:apply.php?job=$job");
            //
        } else {

            $sql = "INSERT INTO applicants(app_numb,applicant,job,education,gpa,total_exp,status,app_date) 
            VALUES(NULL, '$user', '$job', '$elevel', '$gpa','$experence', 'On progress',CURRENT_TIMESTAMP);";

            $run = mysqli_query($conn, $sql);
            if ($run) {
                // echo "Your application sent successfully";
                $_SESSION['success'] = "Your application sent successfully";
                header("location:apply.php?job=$job");
            } else {
                // $_SESSION['error'] = "Error please try again or contact system admin";
                // header("location:apply.php?job=$job");
                echo "Error please try again or contact system admin";
            }
        }
    }
}
?>
<?php $_SESSION['point'] =  $point; ?>