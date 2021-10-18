<?php
@session_start();
$GLOBALS['base_path'] = "http://localhost/fyp/";
?>
<?php
if (isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "user/dashboard.php");
} elseif (isset($_SESSION['fyp_posterData'])) {
    header("location:" . $base_path . "poster/poster.php");
}


if (!isset($_SESSION['msg'])) {
    $_SESSION['msg']['status'] = '';
    $_SESSION['msg']['data'] = '';
}

?>

<?php
if (isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "user/dashboard.php");
}
//if poster data found
elseif (isset($_SESSION['fyp_posterData'])) {
    header("location:" . $base_path . "poster/poster.php");
}


if (!isset($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB-PORTO</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="poster/css/job.css">
</head>

<body class="bg-light">
    <div class="">
        <nav class="navbar navbar-expand-lg shadow bg-timetable sticky-top">
            <a class="navbar-brand text-light" href="#"><b>JOB RECOMMENDATION SYSTEM</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="index.php"><b>Home</b> <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= $base_path; ?>post.php"><b>Post</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= $base_path; ?>registration.php"><b>Registration</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?= $base_path; ?>login.php"><b>Login</b></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xl-10 col-xs-12">
                    <div class="p-5" id="content">
                        <div class="card shadow" style="text-align: center;">
                            <div class="card-header bg-timetable">
                                <h4>Registration-Form</h4>
                            </div>
                            <div class="card-body">
                                <form action="createUser.php" method="post">
                                    <div class="row mt-4">
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" id="First Name" name="fName" type="text"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" id="Last Name" name="lName" type="text"
                                                    placeholder="Last Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" type="Email" id="Email" name="email"
                                                    type="text" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" type="number" id="contact" name="contact"
                                                    min="0" maxlength="12" placeholder="Phone Number" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" id="password" name="password"
                                                    type="password" placeholder="Password" onkeyup="check()"
                                                    minlength="8" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-6 col-xl-6">
                                            <div class="form-group">
                                                <input class="form-control" id="confirm_password"
                                                    name="confirm_password" type="password"
                                                    placeholder="Confirm Password" onkeyup='check();' required>
                                                <span id='message'></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><input type="radio" name="gender" value="M" required> Male
                                        <input type="radio" name="gender" value="F" required> Female
                                    </div>
                                    <?= $_SESSION['msg']['data']; ?>

                                    <div class="form-group">
                                        <?php if ($_SESSION['msg']['status'] != 'success') : ?>
                                        <button style="min-width:100px;" type="submit" class="btn btn-info"
                                            onclick="">Register</button>
                                        <?php endif; ?>
                                    </div>
                                    <?php unset($_SESSION['msg']); ?>
                                    <p>Already have account <a href="login.php">Login</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body>
<?php require_once('footer.php'); ?>