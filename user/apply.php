<?php
require_once('../header.php');
include("../dbconnect.php");
error_reporting(0);

$pagePath = $base_path . "user/openPost.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

//get requested user
$user_id = $_SESSION['user_id'];

$sqlE = "SELECT yexperiance FROM `users` WHERE userID = $user_id;";
$runE = mysqli_query($conn, $sqlE);
$rowE = mysqli_fetch_assoc($runE);
$experience = $rowE['yexperiance'];

if ($experience > 0) {

    // check if request method is post
    if (isset($_GET['job'])) :

        $today = date('Y-m-d');

        //get requested user
        $user_id = $_SESSION['user_id'];

        //get jobpost point

        $point = $_SESSION['point'];

        //get jobpost id
        $job = mysqli_real_escape_string($conn, $_GET['job']);

        //get jobpost gpa
        $gpa = $_SESSION['gpa'];

        // select jobtitle to be diplaied on the card header
        $query = "SELECT jobpost.jtitle FROM `jobpost` WHERE postID = '$job' ORDER BY sdate DESC";

        //run the query
        $run = mysqli_query($conn, $query);

        // check if job with the given query found or not
        if (mysqli_num_rows($run) == 0) {
            include('badaccess.php');
        };

        $postData = mysqli_fetch_assoc($run);

        //query for checking if user is quarify
        $elevel = mysqli_query($conn, "SELECT level.level_name, jobpost.jtitle, users.fName
        FROM education_level, level, jobpost, users
        WHERE jobpost.elevel = level.level_id
        AND education_level.elevel = level.level_id
        AND education_level.userID = users.userID
        AND education_level.userID = $user_id");

        //count from checking quarification query
        $count_rows = mysqli_num_rows($elevel);

        //query for taking gpa of the requested student
        $query_gpa = mysqli_query($conn, "SELECT education_level.gpa AS user_gpa
        FROM level, users, education_level
        WHERE level.level_id = education_level.elevel
        AND education_level.userID = users.userID
        AND education_level.userID = $user_id
        AND level.unit = $point
        AND education_level.GPA >= $gpa ");

        // check if job with the given query found or not
        if (mysqli_num_rows($query_gpa) == 0) {
            include('badaccess.php');
        };

        //store gpa of user
        $take_gpa = mysqli_fetch_array($query_gpa);
        $user_gpa = $take_gpa['user_gpa'];


?>

<?php include("nav.php"); ?>
<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Job Application</h4>
    </div>
    <div class="card-body">

        <a href="allPost.php" class="btn btn-dark col-xl-1 m-2">back</a>
        <div class="card-header text-center h4 text-info"><?= $postData['jtitle'] . ""; ?></div>

        <!-- if found the job that meet the quarification of the user -->
        <?php if ($count_rows) : ?>
        <div class="card card-body mt-3">
            <div class="container" style="min-height:450px;">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button onclick="window.location.reload()" type="button" class="close"
                                    data-dismiss="alert">&times;</button>
                                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <button onclick="window.location.reload()" type="button" class="close"
                                    data-dismiss="alert">&times;</button>
                                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                            </div>
                        <?php else: ?>
                            <form action="applyLogic.php" method="post">
                                <div class="form-group">
                                    <input type="number" name="job" value="<?= $job; ?>" hidden>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="user" value="<?php echo $user_id ?>" hidden>
                                    <input type="number" name="point" value="<?php echo $point ?>" hidden>
                                    <input type="number" name="min_gpa" value="<?php echo $gpa ?>" hidden>
                                    <p class="text-danger">MINIMUM GPA NEEDED IS <?php echo $gpa ?></p>
                                </div>
                                <div class="form-group">
                                    <label class="text-info">Highest Level</label>
                                    <select name="elevel" onchange="callGradePoint()" class="form-control" required>
                                        <option value="">Select Highest Education Level</option>
                                        <?php
                                                    $education_level = mysqli_query($conn, "SELECT level.level_name, level.level_id, level.unit FROM level, 
                                                    users, education_level 
                                                    WHERE level.level_id = education_level.elevel
                                                    AND education_level.userID = users.userID
                                                    AND education_level.userID = $user_id
                                                    AND level.unit >= '$point'");

                                                    while ($level = mysqli_fetch_array($education_level)) { ?>
                                        <option value="<?php echo $level['level_id'] ?>">
                                            <?php echo $level['level_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-info">Your GPA</label>
                                    <input type="number" min="2" max="5" step="0.1" maxlength="3" name="gpa"
                                        class="form-control" value="<?php echo $user_gpa ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label text-info">Total Experience years</label>
                                    <input type="number" maxlength="3" value="<?= $rowE['yexperiance']; ?>" name="txyear"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="apply" class="btn btn-info" value="Apply Now">
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
                <?php else : ?>
                <h5 style='color:red; text-align:center;'> You don't meet the minimum quarification please
                    compare your education level and minimum education level or you don't pass to that level
                </h5>
                <?php endif ?>
                <?php
                //if request method is not post
                else :
                    echo "<h5 style='color:red; text-align:center;'> YOUR UNDER QUAlIFICATIION <a href='allPost.php'> Find job that meet your qualification </a> </h5>";
                endif;
                    ?>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<?php include("badaccess.php"); ?>
<?php } ?>
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>