<?php
require_once('../dbconnect.php');
require_once('../header.php');
$pagePath =  $base_path . "user/work.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];

//get user id
$user = $_SESSION['user_id'];
$profile = mysqli_query($conn, "SELECT profile.*, users.userId FROM users 
                                INNER JOIN profile ON profile.user = users.userId 
                                WHERE users.userId = '$user';
                        ");
if(mysqli_num_rows($profile) > 0){
    $userProfile = mysqli_fetch_array($profile);
    $userProfile = $userProfile['image'];
}else{
    $userProfile = "";
}



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
                            <?php if (isset($_SESSION['error'])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button onclick="window.location.reload()" type="button" class="close"
                                    data-dismiss="alert">&times;</button>
                                <?php echo $_SESSION['error'] ?>
                            </div>
                            <?php endif;
                            unset($_SESSION['error']) ?>

                            <?php if (isset($_SESSION['success'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <button onclick="window.location.reload()" type="button" class="close"
                                    data-dismiss="alert">&times;</button>
                                <?php echo $_SESSION['success'] ?>
                            </div>
                            <?php endif;
                            unset($_SESSION['success']) ?>
                            <form action="profileLogic.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="myfile" placeholder="file name">
                                </div>
                                <div class="form-group">
                                    <?php if (!empty($userProfile) ) : ?>
                                    <input type="number" class="form-control" name="id" value="<?= $user; ?>" hidden >
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
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>