<?php
require_once('../header.php');
require_once('../dbconnect.php');
$pagePath =  $base_path . "user/academic.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}
$userData = $_SESSION['fyp_userData'];


if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
} ?>


<?php include("nav.php"); ?>


<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Academic Qualification</h4>
    </div>
    <div class="card-body">

        <?= $_SESSION['msg']; ?>

        <?php if (empty($_SESSION['msg'])) : ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-body">
                    <span style="float:right; color:green" class="btn"><i class="fa fa-file fa-2x"></i></span>
                    <div class="box-header" style="height:45px;"><strong>Education Background</strong> </div>

                    <div class="box-body" style="min-height:150px;">
                        <form action="AddEducationBackground.php" method="POST" class="was-validated mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Education Level</label>
                                        <select name="elevel" onchange="callGradePoint()" class="form-control" required>
                                            <option value="">Select Education Level</option>
                                            <?php $elevel = mysqli_query($conn, "SELECT * FROM level"); ?>
                                            <?php while ($level = mysqli_fetch_array($elevel)) { ?>
                                            <option value="<?php echo $level['level_id'] ?>">
                                                <?php echo $level['level_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Program Category</label>
                                        <select name="pcategory" placeholder="Select programe" class="form-control"
                                            required>
                                            <option value="">Select program category</option>
                                            <?php $pcategory = mysqli_query($conn, "SELECT * FROM category"); ?>
                                            <?php while ($category = mysqli_fetch_array($pcategory)) { ?>
                                            <option value="<?php echo $category['cat_id'] ?>">
                                                <?php echo $category['cat_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Year</label>
                                        <input type="number" onchange="changeTimeLimit()" min="1990"
                                            max="<?= date('Y'); ?>" name="start_year" class="form-control"
                                            placeholder="Enter starting year" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Finish Year</label>
                                        <input type="number" min="1990" max="<?= date('Y'); ?>" name="end_year"
                                            class="form-control" placeholder="Enter finish year" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group" id="type_gpa" style="display:none;">
                                        <label class="control-label">Minimum Grade Point Average(GPA)</label>
                                        <input type="number" min="2" max="5" step="0.1" maxlength="3" name="gpa"
                                            class="form-control">
                                    </div>

                                   


                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-dark">Submit <i
                                            class="fa fa-save"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;
        unset($_SESSION['msg']); ?>

    </div>
</div>
<?php require_once('footer.php'); ?>
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
    sdate = $("input[name='start_year']").val();
    $("input[name='end_year']").removeAttr('min');
    $("input[name='end_year']").attr('min', sdate);
}
</script>