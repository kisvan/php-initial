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
        <h4>All Job application and result</h4>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="container" style="min-height:450px;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <table id="exampl" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Date</th>
                                    <!-- <th width="50%">Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $user = $_SESSION['user_id'];

                                $query = mysqli_query($conn, "SELECT applicants.*, level.level_name, level.level_id,jobpost.jtitle FROM level, applicants, jobpost
                                            WHERE applicants.education = level.level_id 
                                            AND applicants.job = jobpost.postID
                                            AND applicant = $user
                                            ORDER BY app_date");
                                $row = mysqli_num_rows($query);

                                ?>
                                <?php if ($row > 0) { ?>
                                <?php while ($post = mysqli_fetch_assoc($query)) { ?>
                                <tr>
                                    <td><?= $post['jtitle'] ?></td>
                                    <td><?= $post['app_date'] ?></td>
                                </tr>
                                <table class="table table-bordered">
                                    <tr>
                                        <?php if ($post['status'] == "Accepted") : ?>
                                        <td>
                                            <a class="text-success">
                                                <i class="fa fa-check"></i> Congratulation you have been
                                                selected. You have to come with all certificate.
                                            </a>
                                        </td>
                                        <?php endif ?>
                                        <?php if ($post['status'] == "Not selected") : ?>
                                        <td>
                                            <a class="text-danger">
                                                <i class="fa fa-check"></i> Sorry your not selected due to high
                                                competition or under qualification
                                            </a>
                                        </td>
                                        <?php endif ?>
                                        <?php if ($post['status'] == "On progress") : ?>
                                        <td class="text-center">
                                            <a class="text-warning text-center">
                                                <i class="fa fa-comment"></i> <b>Selection is on progress please
                                                    be
                                                    patient we will notify you when the result is published</b>
                                            </a>
                                        </td>
                                        <?php endif ?>
                                    </tr>
                                </table>

                                <?php } ?>

                                <?php } else {
                                    echo "No Data posted";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php

                ?>

            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>