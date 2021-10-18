<?php
@session_start();
$GLOBALS['base_path'] = "http://localhost/fyp/";
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
    <div class="container">
        <div class="bg-white p-2">
            <div class="d-flex justify-content-end">
                <div class="pr-3">
                    <small><b>Help Desk
                            <span class="text-primary pr-2">phone +255 989 778 878</span>
                            <span class="text-danger">Email helpdesk@jobporto.ac.tz</span></b>
                    </small>
                </div>
            </div>
        </div>
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