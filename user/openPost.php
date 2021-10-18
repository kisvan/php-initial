<?php
require_once('../header.php');
include("../dbconnect.php");
$pagePath = $base_path . "user/openPost.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

?>

<?php include("nav.php"); ?>
<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Job Description</h4>
    </div>
    <div class="card-body">
        <?php if (isset($_GET['jobPost'])) :
            $today = date('Y-m-d');
            $jobPost = mysqli_real_escape_string($conn, $_GET['jobPost']);

            $query = "SELECT jobpost.*, level.level_name, level.unit FROM jobpost, level
                    WHERE jobpost.elevel = level.level_id 
                    AND postID = '$jobPost' 
                    ORDER BY sdate DESC";

            $run = mysqli_query($conn, $query);
            if (mysqli_num_rows($run) == 0) {
                echo "<h5 style='color:red; text-align:center;'> No post data found </h5>";
                exit();
            };
            $postData = mysqli_fetch_assoc($run);
        ?>
        <a href="allPost.php" class="btn btn-dark col-xl-1 m-2">back</a>
        <div class="card-header text-center bg-timetable"><?= $postData['jtitle']; ?></div>

        <div class="card-body">
            <div class="container" style="min-height:450px;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="headings d-flex justify-content-between align-items-center mb-3">
                            <h5 class="text-center text-navy" style="font-weight:bold;">
                                <?= $postData['jtitle'];  ?>
                            </h5>
                        </div>
                        <div class="card p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center">
                                    start date &nbsp; <small> <span class="text-muted">
                                            <?= date('d F. Y', strtotime($postData['sdate'])); ?> </span>
                                    </small>
                                    &nbsp;
                                    End date &nbsp; <small> <span class="text-muted">
                                            <?= date('d F. Y', strtotime($postData['edate'])); ?></span></small>
                                    <br><br>
                                </div>
                                <span class="pull-right">
                                    <?php
                                        if (time() > strtotime($postData['edate'])) :
                                            echo 'Status : <small class="text-danger"> application closed </small>';
                                        elseif (time() < strtotime($postData['sdate'])) :
                                            echo 'Status : <small class="text-primary"> not start</small>';
                                        else :
                                            echo 'Status : <small class="text-success"> application continue</small>';
                                        endif;
                                        ?>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12">
                                <table class="table table-striped mt-3">
                                    
                                    <tr>
                                        <th>Description</th>
                                        <td><?= $postData['jdescription']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>job offered by</th>
                                        <td><?= $postData['employer']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Required</th>
                                        <td><?= $postData['jobsize']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Minimum Education Level</th>
                                        <td><?= $postData['level_name']; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Minimum GPA</th>
                                        <td><?= $postData['gpa']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Work Experience</th>
                                        <td> <?= $postData['yexperience']; ?>Years</td>
                                    </tr>
                                    <tr>
                                        <th>Start Date</th>
                                        <td> <?= date('d F. Y', strtotime($postData['sdate'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td><?= date('d F. Y', strtotime($postData['edate'])); ?></td>
                                    </tr>
                                </table>
                                <div class="action d-flex justify-content-between mt-2 align-items-center">
                                    <div class="reply px-">
                                        <?php if (time() > strtotime($postData['edate'])) : ?>
                                        <button class="btn btn-danger">Closed you cant apply</button>
                                        <?php elseif (time() < strtotime($postData['sdate'])) : ?>
                                        you can't apply now wait till the date
                                        <?php else : ?>
                                        <a class="btn btn-info text-link"
                                            href="apply.php?job=<?= $postData['postID']; ?>">
                                            Apply now
                                        </a>
                                        <?php endif;
                                            $_SESSION['gpa'] = $postData['gpa'];
                                            $_SESSION['point'] = $postData['unit'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            else :
                include("badaccess.php");
            endif;
                ?>

            </div>
        </div>
    </div>
    <?php require_once('footer.php'); ?>
    <?php require_once('../footer.php'); ?>