<?php
require_once('../header.php');
@include("../dbconnect.php");
$pagePath =  $base_path . "poster/addJobPost.php";
if (!isset($_SESSION['fyp_posterData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_posterData'];

if (isset($_GET['jobPost'])) {

    $job =  $_GET['jobPost'];
    $job_post = mysqli_query($conn, "SELECT jobpost.*, category.cat_name, category.cat_id, level.level_name, level.level_id FROM jobpost, category, level
    WHERE jobpost.pcategory = category.cat_id
    AND jobpost.elevel = level.level_id
    AND postID = '$job'");
    $job_array = mysqli_fetch_array($job_post);

    if (!isset($_SESSION['msg'])) {
        $_SESSION['msg'] = '';
    }

?>

<?php include("nav.php"); ?>
<div class="card">
    <div class="card-header text-center bg-timetable">
        <h4 class="text-light">Edit Job Post</h4>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="col-md-12 col-xs-12 col-xl-12" style="margin:auto">
                <form action="update_post.php" method="post" accept-charset="utf-8" class="was-validated"
                    enctype="multipart/form-data">

                    <?= $_SESSION['msg']; ?>

                    <?php if (empty($_SESSION['msg'])) : ?>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group" style="font-weight: bold;">
                                <label>Job Title</label>
                                <input class="form-control" value="<?php echo $job_array['jtitle'] ?>" name="jtitle"
                                    type="text" placeholder="Job Title" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group" style="font-weight: bold;">
                                <label>Job provided by</label>
                                <input class="form-control" value="<?php echo $job_array['employer'] ?>" name="employer"
                                    type="text" placeholder="Job provider" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group" style="text-align: left;">
                                <div class="form-group">
                                    <label class="control-label">Minimum Education Level</label>
                                    <select name="elevel" onchange="callGradePoint()" class="form-control input-sm"
                                        required>
                                        <option value="<?php echo $job_array['level_id'] ?>" selected="selected">
                                            <?php echo $job_array['level_name'] ?></option>
                                        <?php $elevel = mysqli_query($conn, "SELECT * FROM level  ORDER BY level_id"); ?>
                                        <?php while ($level = mysqli_fetch_array($elevel)) { ?>
                                        <option value="<?php echo $level['level_id']; ?>">
                                            <?php echo $level['level_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <label class="control-label">Programme Category</label>
                                <select name="pcategory" class="form-control" required>
                                    <option value="<?php echo $job_array['cat_id'] ?>" selected="selected">
                                        <?php echo $job_array['cat_name'] ?></option>
                                    <?php $pcategory = mysqli_query($conn, "SELECT * FROM `category` ORDER BY`cat_id` ASC"); ?>
                                    <?php while ($category = mysqli_fetch_array($pcategory)) { ?>
                                    <option value="<?php echo $category['cat_id']; ?>">
                                        <?php echo $category['cat_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <label class="control-label">Minimum Years Of Experience</label>
                                <input type="number" value="<?php echo $job_array['yexperience'] ?>" min="1" max="30"
                                    class="form-control" name="yexperiance" placeholder="Enter year of experiance"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <label class="control-label">Minimum Grade Point Average(GPA)</label>
                                <input type="number" value="<?php echo $job_array['gpa'] ?>" min="2" max="5" step="0.1"
                                    maxlength="3" name="gpa" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <label class="control-label">Start of Application</label>
                                <input type="date" value="<?php echo date($job_array['sdate']) ?>"
                                    onchange="changeTimeLimit()" name="sdate" class="form-control"
                                    placeholder="starting date" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <label class="control-label">End of Application</label>
                                <input type="date" value="<?php echo $job_array['edate'] ?>"
                                    min="<?= date("Y-m-d", (60 * 60 * 24 * 3 + time())); ?>" name="edate"
                                    class="form-control" placeholder="last date" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label">Job Positions Availables</label>
                                    <input type="number" value="<?php echo $job_array['jobsize'] ?>" min="1"
                                        name="jobsize" class="form-control" required>
                                    <input type="number" value="<?php echo $job ?>" name="id" required hidden>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-xl-12">
                            <div class="form-group">
                                <label class=" control-label">Job Description</label>
                                <textarea class="form-control" value="" name="jdescription" rows="6" style="width:100%;"
                                    placeholder="Job Description"
                                    required><?php echo $job_array['jdescription'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-6 col-xl-6">
                            <div class="form-group">
                                <button type="submit" name="update" class="btn btn-outline-dark">
                                    Save changes <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endif;
                        unset($_SESSION['msg']); ?>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</body>
<?php require_once('../footer.php'); ?>

<script>
function callGradePoint() {
    $("#type_division, #type_gpa").hide('fast');
    level = $("select[name='elevel']").val();
    if (level > 5) {
        $("#type_division").show('slow');
        $("input[name='gpa']").val('');
        $("input[name='gpa']").removeAttr('required');
        $("select[name='division']").attr('required', 'required');
    } else if (level <= 5) {
        $("#type_gpa").show('slow');
        $("select[name='division']").val('');
        $("select[name='division']").removeAttr('required');
        $("input[name='gpa']").attr('required', 'required');
    }
}

function changeTimeLimit() {
    sdate = $("input[name='sdate']").val();
    $("input[name='edate']").removeAttr('min');
    $("input[name='edate']").attr('min', sdate);
}
</script>

<?php } else {
    echo "page not found";
} ?>