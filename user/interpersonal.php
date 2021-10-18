<?php
require_once('../header.php');
require_once('../dbconnect.php');
$pagePath =  $base_path . "user/interpersonal.php";

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
}
?>

<?php include("nav.php"); ?>


<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Peronal Information</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="card card-body">
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
                    <center>
                        <?php if (!empty($userProfile)) : ?>
                        <img src="../img/profile/<?= $userProfile; ?>" alt="" width="100" height="100"
                            class="mr-3 shadow-sm ml-4">
                        <a href="<?= $base_path; ?>user/profile.php" class="ml-4 btn btn-success ">Update Picture</a>
                        <?php else : ?>
                        <img src="profile.jpg" alt="" width="100" height="100"
                            class="mr-3 rounded-circle img-thumbnail shadow-md">
                        <a href="<?= $base_path; ?>user/profile.php" class="ml-4 btn btn-success ">Upload Picture</a>
                        <?php endif; ?>
                    </center>
                <?php endif; ?>
            </div>

            <div class="col-md- ml-1 card card-body">
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                    <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <?php else: ?>
                    <form action="update_profile.php" method="POST" class="was-validated">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fName" value="<?= $userData['fName']; ?>" class="form-control"
                                        placeholder="Enter your first name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>last name</label>
                                    <input type="text" name="lName" value="<?= $userData['lName']; ?>" class="form-control"
                                        placeholder="Enter your last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input type="text" name="contact" value="<?= $userData['contact']; ?>"
                                        class="form-control" placeholder="Enter your contact" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control" required>

                                        <?php if ($userData['gender'] = 'M') : ?>
                                        <option selected="selected" value='M'> male </option>
                                        <option value='F'> female </option>
                                        <?php else : ?>
                                        <option value='M'> male </option>
                                        <option selected="selected" value='F'> female </option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><button type="submit" class="btn btn-outline-dark">Submit <i
                                    class="fa fa-save"></i></button></div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
</body>
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>