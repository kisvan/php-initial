<?php
require_once('../header.php');
$pagePath =  $base_path . "poster/viewJobPost.php";
if (!isset($_SESSION['fyp_posterData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_posterData'];

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}

?>


<?php include("nav.php"); ?>

<div class="card">
    <div class="card-header text-center bg-timetable fw-bolder">
        <h4> List of Posted Job</h4>
    </div>
    <div class="card-body">
        <div class="col-xl-12" style="margin:auto; min-height:400px;">
            <table id="example" class="table table-bordered table-hover dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Job title</th>
                        <th>employer</th>
                        <th>program</th>
                        <th>start</th>
                        <th>end</th>
                        <th>status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php require_once('allPostedJob.php'); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require_once('includes/footer.php'); ?>
<?php require_once('../footer.php'); ?>