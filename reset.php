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
				<div class="p-5 col-xl-6" id="content" >
					<div class="card" style="text-align: center;">
						<div class="card-header" style="text-align: center; font-weight: bold;">Reset Your Password</div>
						<div class="card-body">
							<form action="reseting.php" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<div class="form-group">
								<label>Email</label>
								<div class="form-group"><input class="form-control" id="email" name="email" type="email" placeholder="Your Email" required></div>
								<div class="form-group"><button type="submit" class="btn btn-info" href="">Submit</button></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
</body>
<?php include("footer.php"); ?>
