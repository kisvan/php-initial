<?php
require_once('../dbconnect.php');
require_once('../header.php');

$pagePath =  $base_path . "poster/profile.php";

$userData = $_SESSION['fyp_userData'];
//get user id
$user = $_SESSION['user_id'];

$profile = mysqli_query($conn, "SELECT profile.image, profile_id FROM users, profile WHERE profile.user = users.userId AND profile.user='$user'");
$profile_row = mysqli_fetch_array($profile);

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
} ?>


<body style="background-color: grey">
    <?php include("nav.php"); ?>
    <div class="page-content p-5" id="content">
        <div class="card">
            <div class="card-header bg-timetable text-center">
                <h4>USER PROFILE IMAGE</h4>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow p-3">
                            <p class="text-center">Choose file to upload your profile picture</p>
                            <form action="profileLogic.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="myfile" placeholder="file name">
                                </div>
                                <div class="form-group">
                                    <?php if ($profile_row['image']) : ?>
                                    <input type="number" class="form-control" name="id"
                                        value="<?php echo $profile_row['profile_id'] ?>" hidden>
                                    <input type="submit" class="btn bg-timetable" name="update" value="Update Profile">
                                    <?php else : ?>
                                    <input type="submit" class="btn bg-timetable" name="upload" value="upload">
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once('includes/footer.php'); ?>