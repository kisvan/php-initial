<?php
require_once('../header.php');
$pagePath =  $base_path . "user/work.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];


if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
} ?>


<body style="background-color: grey">
    <?php include("nav.php"); ?>

    <div class="page-content p-5" id="content">
        <div class="card">
            <div class="card-header bg-timetable text-center">
                <h4>Working Experience</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 card card-body">
                    <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                    <?php else: ?>
                        <form action="update_profile.php" method="POST" class="was-validated">

                            <div class="form-group">
                                <label>Institution / Organization:</label>
                                <select name="organization" class="form-control" required>
                                    <?php if (empty($userData['organization'])) : ?>
                                    <option value="" selected="selected" disabled> Select </option>
                                    <?php else : ?>
                                    <option selected="selected"> <?= $userData['organization']; ?> </option>
                                    <?php endif; ?>
                                    <option>Social Services</option>
                                    <option>Health Services</option>
                                    <option>Education Sectors</option>
                                    <option>Financial Services</option>
                                    <option>Transport and Communication Services</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Job Category</label>
                                <select name="jcategory" class="form-control" required>

                                    <?php if (empty($userData['jcategory'])) : ?>
                                    <option value="" selected="selected" disabled> Select </option>
                                    <?php else : ?>
                                    <option selected="selected"> <?= $userData['jcategory']; ?> </option>
                                    <?php endif; ?>
                                    <option>Procurement And Logistics</option>
                                    <option>Statistics And Mathematics</option>
                                    <option>IT And Telecoms</option>
                                    <option>Engineering And Construction</option>
                                    <option>Education And Training</option>
                                    <option>Finance And Accounting</option>
                                    <option>Healthcare And Pharmaceutical</option>
                                    <option>Farming And Agribusiness</option>
                                    <option>HR And Administrtion</option>
                                    <option>International Relation</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Years Of Experience</label>
                                <input type="number" min="1" max="30" class="form-control"
                                    value="<?= $userData['yexperiance']; ?>" name="yexperiance"
                                    placeholder="Enter Year Of Experiance" required>

                            </div>

                            <div class="form-group"><button type="submit" class="btn btn-outline-dark">Submit <i
                                        class="fa fa-save"></i></button>
                            </div>


                        </form>
                    <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>