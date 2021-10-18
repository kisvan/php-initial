<?php
require_once('../header.php');
require_once('../dbconnect.php');
$pagePath =  $base_path . "poster/applicantCV.php ";

/* get userId and applicantNumber jobId*/
$user = $_GET['user_id'];
$app_number = $_GET['app_number'];
$postID = $_GET['jobPost'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE userID = $user");
$userCv = mysqli_fetch_array($query);

$profile = mysqli_query($conn, "SELECT profile.image FROM users, profile WHERE profile.user = users.userId AND profile.user='$user'");
$profile_row = mysqli_fetch_array($profile);


/* function to print level of knowledge in different application of ms */
function getExperiance($level)
{
    if ($level == '1') {
        echo 'Very Good';
    } elseif ($level == '2') {
        echo 'Good';
    } elseif ($level == '3') {
        echo 'Poor';
    }
}

?>


<?php include("nav.php"); ?>

<div class="card shadow">
    <div class="card-header text-center bg-timetable fw-bolde ">
        <h4>APPLICANT CV</h4>
    </div>
    <div class=" card-body">
        <div class="col-md-12" style="margin:auto;">
            <table class="table">
                <tr>
                    <td class="text-center bg-timetable fw-bolde" colspan='2'>
                        <strong>User Cariculum Vitae</strong>
                    </td>
                </tr>
                <tr>
                    <td style="min-width:80%;">
                        <h5 class="text-info">
                            <?= ucfirst($userCv['fName']) . " " . ucfirst($userCv['lName']); ?></h5>
                        <div class="text-navy"><?= ucfirst($userCv['contact']); ?></div>
                        <div class="text-navy"><?= ucfirst($userCv['email']); ?></div>
                    </td>
                    <td class="pull-right" style="max-width:102px">
                        <?php if ($profile_row['image']) : ?>
                        <img src="../img/profile/<?php echo $profile_row['image'] ?>" alt="..." width="100" height="100"
                            class="mr-3 rounded-circle img-thumbnail shadow-md">
                        <?php else : ?>
                        <img src="profile.jpg" alt="..." width="100" height="100"
                            class="mr-3 rounded-circle img-thumbnail shadow-md">
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Objectives:</strong><br>
                        <p><?= ucfirst($userCv['objectives']); ?></p>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <strong>Education:</strong><br>
                        <table class="table-bordered" width="100%">
                            <thead class="bg-timetable fw-bolde">
                                <tr>
                                    <th>Level</th>
                                    <th>Category</th>
                                    <td>GPA</td>
                                    <!-- <td>Division</td> -->
                                    <td>Duration</td>
                                </tr>
                            </thead>
                            <?php $education_level = mysqli_query($conn, "SELECT level_name, category.cat_name, education_level.*
                                        FROM `education_level`, `category`, `level`
                                        WHERE education_level.pcategory = category.cat_id
                                        AND education_level.elevel = level.level_id
                                        AND userID = $user "); ?>
                            <?php while ($level_row = mysqli_fetch_assoc($education_level)) { ?>
                            <tr>
                                <td><?= $level_row['level_name'] ?></td>
                                <td><?= $level_row['cat_name'] ?></td>
                                <td><?= $level_row['gpa'] ?></td>
                                <!-- <td><?= $level_row['division'] ?></td> -->
                                <td>From <?= $level_row['sdate'] . " to " . $level_row['edate'] ?></td>
                            </tr>
                            <?php  } ?>

                        </table>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <strong>Work Experiance:</strong><br>
                        <table class="table-bordered" width="100%">
                            <tr class="">
                                <th></th>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr>
                                <td><?= $userCv['yexperiance'] . " years "; ?></td>
                                <td><?= $userCv['jcategory']; ?></td>
                                <td><?= ucfirst($userCv['organization']); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <strong>Skills:</strong><br>
                        <ul>
                            <li>
                                <span class="text-navy">Oriented On Computer Uses</span>
                                <ol>Experiance on Introduction To Computer : <strong>
                                        <?= getExperiance($userCv['icomputer']); ?> </strong></ol>
                            </li>
                            <li>
                                <span class="text-navy">Oriented on Microsoft Office uses</span>
                                <ol>Experiance on Microsoft Word : <strong>
                                        <?= getExperiance($userCv['mWord']); ?></strong></ol>
                                <ol>Experiance on Microsoft Excel : <strong>
                                        <?= getExperiance($userCv['mExcel']); ?></strong></ol>
                                <ol>Experiance on Microsoft Power Point : <strong>
                                        <?= getExperiance($userCv['mPoint']); ?></strong></ol>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
            <hr>
            <a href="acception.php?app_number=<?php echo $app_number ?>&jobPost=<?php echo $postID ?>"
                class="btn btn-outline-dark">Accept This
                applicant</a>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>