<?php
require_once('../header.php');
require_once('../dbconnect.php');

if (isset($_GET['app_number'])) {
    $app_number = $_GET['app_number'];
    $postID = $_GET['jobPost'];
    $status = "Accepted";

    $accept_applicant = mysqli_query($conn, "UPDATE applicants SET status='$status' WHERE app_numb = '$app_number'");

    if ($accept_applicant) {
        $_SESSION['success'] = "Applicant of Application number " . $app_number . " Selected Succesfully";
        header("location:openJobPost.php?jobPost=$postID");
    } else {
        $_SESSION['error'] = "Applicant of Application number <b>" . $app_number . "</b> Not Accepted Succesfully";
        header("location:openJobPost.php?jobPost=$postID");
    }
} else if (isset($_GET['reset'])) {
    $postID = $_GET['reset'];
    $status = "On progress";

    $accept_applicant = mysqli_query($conn, "UPDATE applicants SET status='$status'");

    if ($accept_applicant) {
        $_SESSION['success'] = "All selection reseted Reset";
        header("location:openJobPost.php?jobPost=$postID");
    } else {
        $_SESSION['error'] = "Fail to reset applications";
        header("location:openJobPost.php?jobPost=$postID");
    }
}


//
else { ?>
<div class="row">
    <div class="card">
        <div class="card-body">
            <h2>Bad Access Method</h2>
        </div>
    </div>
</div>
<?php }  ?>