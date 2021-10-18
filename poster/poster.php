<?php
require_once('../header.php');
require_once('../dbconnect.php');

$pagePath =  $base_path . "poster/poster.php";

if (!isset($_SESSION['fyp_posterData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_posterData'];

//get user id
$user = $_SESSION['user_id'];

$profile = mysqli_query($conn, "SELECT profile.image FROM users, profile WHERE profile.user = users.userId AND profile.user='$user'");
$profile_row = mysqli_fetch_array($profile);

if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}

?>

<?php include("nav.php"); ?>
<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Interpersonal Information</h4>
    </div>
    <div class="card-body">

        <div class="col-md-12">
            <div class="col-md-6" style="margin:auto; text-align:center">
                <?php if ($profile_row['image']) : ?>

                <img src="../img/profile/<?php echo $profile_row['image'] ?>" alt="..." width="100" height="100"
                    class="mr-3 shadow-sm ml-4">
                <a href="<?= $base_path; ?>poster/profile.php" class="ml-4 btn btn-success ">Update Picture</a>
                <?php else : ?>

                <img src="profile.jpg" alt="..." width="100" height="100"
                    class="mr-3 rounded-circle img-thumbnail shadow-md">
                <a href="profile.php" class="ml-4 btn btn-success ">Upload Picture</a>
                <?php endif; ?>
            </div>
            <br><br>
            <div class="col-md-6" style="margin:auto">
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <?php else: ?>
                    <form action="update_profile.php" method="POST" class="was-validated">

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fName" value="<?= $userData['fName']; ?>" class="form-control"
                                placeholder="Enter Your First name" required>
                        </div>

                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" name="lName" value="<?= $userData['lName']; ?>" class="form-control"
                                placeholder="Enter Your Last Name" required>
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="contact" value="<?= $userData['contact']; ?>" class="form-control"
                                placeholder="Enter Your Contact" required>
                        </div>

                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control" required>

                                <?php if ($userData['gender'] = 'M') : ?>
                                <option selected="selected" value='M'> Male </option>
                                <option value='F'> Female </option>
                                <?php else : ?>
                                <option value='M'> Male </option>
                                <option selected="selected" value='F'> Female </option>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group"><button type="submit" class="btn btn-outline-dark">Submit</button></div>
                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php require_once('includes/footer.php'); ?>
<?php require_once('../footer.php'); ?>