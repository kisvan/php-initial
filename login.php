<?php
@session_start();
$GLOBALS['base_path'] = "http://localhost/fyp/";
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
                <div class="p-5 col-xl-6 col-xs-12 col-md-6" id="content">
                    <div class="card shadow">
                        <div class="card-header bg-timetable text-center p-4">
                            <h5>JOB RECOMENDATION SYSTEM</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="loginQuery.php" class="p-1">

                                <div class="form-group mt-3">
                                    <input class="form-control" type="email" name="email" placeholder="email" required>
                                </div>

                                <div class="form-group " style="margin-top: 2rem;">
                                    <input class="form-control" type="password" name="password" placeholder="password"
                                        required>
                                </div>

                                <?php echo $_SESSION['msg'];
                                unset($_SESSION['msg']); ?>

                                <div class="form-group">
                                    <button class="btn bg-timetable btn-block">login</button><a href="#"></a>
                                </div>
                                <div class="form-group text-center">
                                    <label>Forget Password? <a href="reset.php">Reset Now</a></label>
                                </div>
                                <div class="form-group text-center">
                                    <p class="message"> Not registered? <a href="registration.php">Create an account</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php include("footer.php"); ?>