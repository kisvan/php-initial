<?php
require_once('../header.php');
include("../dbconnect.php");

if (isset($_GET['jobPost']) && isset($_SESSION['fyp_posterData'])) {

    $email = $_SESSION['fyp_posterData']['email'];

    $postID = $_GET['jobPost'];

    $email = $_SESSION['fyp_posterData']['email'];

    $pagePath =  $base_path . "poster/openJobPost.php?jobPost=$postID ";


    // $query = "SELECT * FROM `jobpost` WHERE poster = '$email'; ";

    // $run = mysqli_query($conn, $query);
    // $row = mysqli_num_rows($run);
?>
<?php include("nav.php"); ?>
<div class="card">
    <div class="card-header  text-center bg-timetable">
        <h4>List of Posted Job</h4>
    </div>
    <div class="card-body">

        <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success'] ?>
        </div>
        <?php endif;
            unset($_SESSION['success']) ?>

        <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'] ?>
        </div>
        <?php endif;
            unset($_SESSION['error']) ?>
        <div class="col-xl-12" style="margin:auto; min-height:450px;">
            <a href="viewJobPost.php" class="btn btn-dark btn-sm mb-3">Back</a>
            <a href="acception.php?reset=<?php echo $postID ?>" class="btn btn-success btn-sm mb-3">Reset
                Selection</a>
            <!-- <a href="viewJobPost.php" class="btn btn-danger btn-sm mb-3">Publish</a> -->
            <table id="exampl" class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Applicant#</th>
                        <th>Level</th>
                        <th>Expe</th>
                        <th>gpa</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = mysqli_query($conn, "SELECT applicants.*, level.level_name, level.level_id, level.unit
                            FROM level, applicants WHERE applicants.education = level.level_id 
                            AND job=$postID ORDER BY level.unit DESC, gpa DESC, total_exp DESC, app_date");

                        $row = mysqli_num_rows($query);

                        ?>
                    <?php if ($row > 0) { ?>
                    <?php while ($post = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?= $post['app_numb'] ?></td>
                        <td><?= $post['level_name'] ?></td>
                        <td><?= $post['total_exp'] ?></td>
                        <td><?= $post['gpa'] ?></td>
                        <td><?= $post['status'] ?></td>
                        <td><?= $post['app_date'] ?></td>
                        <?php if ($post['status'] == "On progress") : ?>
                        <td>
                            <a
                                href="applicantCV.php?app_number=<?= $post['app_numb'] ?>&user_id=<?= $post['applicant'] ?>&jobPost=<?php echo  $postID ?>">
                                <i class="fa fa-eye"></i>
                                preview cv
                            </a>
                        </td>
                        <?php endif ?>
                        <?php if ($post['status'] == "Accepted") : ?>
                        <td>
                            <a class="text-success">
                                <i class="fa fa-check"></i> Selected
                            </a>
                        </td>
                        <?php endif ?>
                    </tr>

                    <?php } ?>

                    <?php } else {
                            echo "No Data posted";
                        } ?>
                </tbody>
            </table>

        </div>
    </div>
    <?php require_once('includes/footer.php'); ?>
</div>
</div>

<?php
} else {
    header("location:login.php");
}