<?php
require_once('../header.php');
$pagePath =  $base_path . "user/computer.php";

if (!isset($_SESSION['fyp_userData'])) {
  header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];


if (!isset($_SESSION['msg'])) {
  $_SESSION['msg'] = '';
}

?>


<?php
function getExperiance($data, $input)
{
  if ($data == $input) {
    echo " checked";
  }
}

?>

<?php include("nav.php"); ?>

<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Computer Experience</h4>
    </div>
    <div class="card-body">
        <div class="col-md-12">
            <div class="col-md-6" style="margin:auto">
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <?php else: ?>
                    <form action="update_profile.php" method="POST" class="was-validated">

                        <div class="form-group ">
                            <strong>Experience On Introduction To Computer</strong>
                            <div>
                                <input type="radio" id="Verygood" <?php getExperiance('1', $userData['icomputer']); ?>
                                    name="icomputer" value="1" required>
                                <label for="male">Very Good</label><br>
                                <input type="radio" id="Good" name="icomputer"
                                    <?php getExperiance('2', $userData['icomputer']); ?> value="2" required>
                                <label for="Good">Good</label><br>
                                <input type="radio" id="Poor" name="icomputer"
                                    <?php getExperiance('3', $userData['icomputer']); ?> value="3" required>
                                <label for="other">Poor</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>Experience On Microsoft Word</strong>
                            <div>
                                <input type="radio" id="Verygood" name="mWord" value="1"
                                    <?php getExperiance('1', $userData['mWord']); ?> required>
                                <label for="Verygood">Very Good</label><br>
                                <input type="radio" id="Good" name="mWord" value="2"
                                    <?php getExperiance('2', $userData['mWord']); ?> required>
                                <label for="Good">Good</label><br>
                                <input type="radio" id="Poor" name="mWord" value="3"
                                    <?php getExperiance('3', $userData['mWord']); ?> required>
                                <label for="other">Poor</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>Experience On Microsoft Excel</strong>
                            <div>
                                <input type="radio" id="Verygood" name="mExcel" value="1"
                                    <?php getExperiance('1', $userData['mExcel']); ?> required>
                                <label for="Verygood">Very Good</label><br>
                                <input type="radio" id="Good" name="mExcel" value="2"
                                    <?php getExperiance('2', $userData['mExcel']); ?> required>
                                <label for="Good">Good</label><br>
                                <input type="radio" id="Poor" name="mExcel" value="3"
                                    <?php getExperiance('3', $userData['mExcel']); ?> required>
                                <label for="other">Poor</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <strong>Experience On Microsoft Power Point</strong>
                            <div>
                                <input type="radio" id="Verygood" name="mPoint" value="1"
                                    <?php getExperiance('1', $userData['mPoint']); ?> required>
                                <label for="Verygood">Very Good</label><br>
                                <input type="radio" id="Good" name="mPoint" value="2"
                                    <?php getExperiance('2', $userData['mPoint']); ?> required>
                                <label for="Good">Good</label><br>
                                <input type="radio" id="Poor" name="mPoint" value="3"
                                    <?php getExperiance('3', $userData['mPoint']); ?> required>
                                <label for="other">Poor</label>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group"><button type="submit" class="btn btn-outline-dark">Submit <i
                                    class="fa fa-save"></i></button></div>


                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>