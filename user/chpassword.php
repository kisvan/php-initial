<?php
require_once('../header.php');
$pagePath =  $base_path . "poster/chpassword.php";
if (!isset($_SESSION['fyp_userData'])) {
  header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];

if (!isset($_SESSION['msg'])) {
  $_SESSION['msg'] = '';
}

?>



<?php include("nav.php"); ?>

<div class="card">
    <div class="card-header text-center bg-timetable">
        <h4>Change Account Password</h4>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-md-6 card card-body" style="margin:auto">
                <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])) : ?>
                        <?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?>
                <?php else: ?>
                    <form action="changePass.php" method="post" accept-charset="utf-8" class="was-validated"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input class="form-control" id="old password" name="oldPassword" type="password"
                                placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input class="form-control" id="password" name="newPassword" type="password"
                                placeholder="New Password" onkeyup="check();" minlength="8" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input class="form-control" id="confirm_password" name="confirm_password" type="password"
                                placeholder="Confirm New Password" onkeyup="check();" required>
                        </div>
                        <div class="form-group">
                            <span id='message'></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-dark">Save Changes <i
                                    class="fa fa-save"></i></button>
                        </div>


                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>
<script>
var check = function() {
    if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Matching';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Not Matching';
    }
}
</script>