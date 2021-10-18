<?php
require_once('../header.php');
include("../dbconnect.php");
$pagePath = $base_path . "user/dashboard.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

?>


<body style="background-color: grey">
    <?php include("nav.php"); ?>
    <div class="page-content col-md-12 p-5" id="content">
        <div class="card">
            <div class="card-header bg-timetable text-center p-3">
                <h4>JOB RECOMMENDATION SYSTEM</h4>
            </div>
            <div class="card-body">

                <?php $user = $_SESSION['fyp_userData']; ?>

                <?php
                $user = $_SESSION['user_id'];

                $query = mysqli_query($conn, "SELECT applicants.*, level.level_name, level.level_id,jobpost.jtitle FROM level, applicants, jobpost
                    WHERE applicants.education = level.level_id 
                    AND applicants.job = jobpost.postID
                    AND applicant = $user
                    ORDER BY app_date DESC
                    LIMIT 1");
                $row = mysqli_num_rows($query);

                ?>
                <?php if ($row > 0) { ?>
                <?php while ($post = mysqli_fetch_assoc($query)) { ?>

                <table class="table table-bordered">
                    <tr>
                        <?php if ($post['status'] == "Accepted") : ?>
                        <td>
                            <a class="text-success" href="result.php">
                                <i class="fa fa-check"></i> Congaturation you have been
                                selelected. You have to come with all cirtificate... read more
                            </a>
                        </td>
                        <?php endif ?>
                        <?php if ($post['status'] == "Not selected") : ?>
                        <td>
                            <a class="text-danger" href="result.php">
                                <i class="fa fa-check"></i> Sorry your not selected due to high
                                compition or under qulification ... read more
                            </a>
                        </td>
                        <?php endif ?>
                        <?php if ($post['status'] == "On progress") : ?>
                        <td class="text-center">
                            <a class="text-warning text-center">
                                <i class="fa fa-comment"></i> <b>Result is In Progress</b>
                            </a>
                        </td>
                        <?php endif ?>
                    </tr>
                </table>

                <?php } ?>

                <?php } else { ?>
                <!-- No job application found -->
                <?php } ?>

                <h3>APPLICATION TIPS</h3>
                <p>Complete your Profile to maximize your earning opportunities

                    A professional profile is essential to effectively showcase your skills. Applicants who have
                    completed their profile are far more likely to get hired by employers.
                    <br>
                    <b>Step 1:</b> Complete your Profile.
                    Please complete ALL of the required fields of the forms found in the left-hand menu of this
                    page.
                    <br>
                    <b>Step 2:</b> Apply to a job posted online
                </p>
                <ul>
                    <li>Click on the post link on the page below.</li>
                    <li>Select a vacancy of interest</li>
                    <li>Read the job requirements thoroughly.</li>
                    <li>Click 'apply' for this vacancy'.</li>
                    <li>Receipt of online applications will be confirmed via the email address or mobile phone
                        number
                        you have provided.</li>
                </ul>

                <p>Click on the Review CV menu bar to review your CV before submission and verify that your
                    email
                    address is correct.
                    If you are experiencing additional problems, please give us a feedback here.</p>

            </div>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>
<?php include('../footer.php'); ?>