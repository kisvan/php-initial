<?php
require_once('../header.php');
require_once('../dbconnect.php');
$pagePath =  $base_path . "user/preview.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];

//get user id
$user = $_SESSION['user_id'];

$profile = mysqli_query($conn, "SELECT profile.image FROM users, profile WHERE profile.user = users.userId AND profile.user='$user'");
$profile_row = mysqli_fetch_array($profile);

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
<div class="card">
    <div class="card-header text-center bg-timetable">
        <h4>Preview Your CV</h4>
    </div>
    <div class="card-body">
        <div class="col-md-12" style="margin:auto;">
            <table class="table">
                <tr>
                    <td class="bg-info text-center text-white" colspan='2'>
                        <strong>User Cariculum Vitae</strong>
                    </td>
                </tr>
                <tr>
                    <td style="min-width:80%;">
                        <h5 class="text-info">
                            <?= ucfirst($userData['fName']) . " " . ucfirst($userData['lName']); ?></h5>
                        <div class="text-navy"><?= ucfirst($userData['contact']); ?></div>
                        <div class="text-navy"><?= ucfirst($userData['email']); ?></div>
                    </td>
                    <td class="pull-right" style="max-width:102px">
                        <?php if ($profile_row['image']) : ?>
                        <img src="../img/profile/<?php echo $profile_row['image'] ?>" alt="..." width="100" height="100"
                            class="mr-3 rounded-circle img-thumbnail shadow-md">
                        <a href="<?= $base_path; ?>user/profile.php" class="btn btn-success btn-sm mt-2">Update
                            Picture</a>
                        <?php else : ?>
                        <img src="profile.jpg" alt="..." width="100" height="100"
                            class="mr-3 rounded-circle img-thumbnail shadow-md">
                        <a href="<?= $base_path; ?>user/profile.php">Upload Picture</a>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Objectives:</strong><br>
                        <p><?= ucfirst($userData['objectives']); ?></p>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <strong>Education:</strong><br>
                        <table class="table-bordered" width="100%">
                            <tr class="bg-info text-white">
                                <th>Level</th>
                                <th>Category</th>
                                <td>GPA</td>
                                <!-- <td>Division</td> -->
                                <td>Duration</td>

                            </tr>
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
                            <tr>
                                <td><?= $userData['yexperiance'] . " years "; ?></td>
                                <td><?= $userData['jcategory']; ?></td>
                                <td><?= ucfirst($userData['organization']); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Skills:</strong><br>
                        <ul>
                            <li>
                                <span class="text-navy">Oriented On Computer Uses</span>
                                <ol>Experiance on Introduction To Computer : <strong>
                                        <?= getExperiance($userData['icomputer']); ?> </strong></ol>
                            </li>
                            <li>
                                <span class="text-navy">Oriented on Microsoft Office uses</span>
                                <ol>Experiance on Microsoft Word : <strong>
                                        <?= getExperiance($userData['mWord']); ?></strong></ol>
                                <ol>Experiance on Microsoft Excel : <strong>
                                        <?= getExperiance($userData['mExcel']); ?></strong></ol>
                                <ol>Experiance on Microsoft Power Point : <strong>
                                        <?= getExperiance($userData['mPoint']); ?></strong></ol>
                            </li>
                        </ul>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                    <td>

                    </td>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>