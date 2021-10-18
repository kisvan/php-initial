<?php
@session_start();
$GLOBALS['base_path'] = "http://localhost/fyp/";
?>
<?php require_once('../header.php');
$userData = $_SESSION['fyp_userData'];
?>
<?php require_once('../dbconnect.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VMS</title>

    <!-- Custom fonts for this template-->
    <link href="../poster/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../poster/css/job-bootstrao.css" rel="stylesheet">
    <link href="../poster/css/bootstrap.css" rel="stylesheet">
    <link href="../poster/css/animate.css" rel="stylesheet">
    <link href="../poster/css/job.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-timetable sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Job Portal application</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class=" nav-link" href="<?= $base_path; ?>poster/poster.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pasanal Detail -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span> Personal Detail</span>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-timetable py-2 collapse-inner rounded">

                        <div <?php getActive($base_path . 'user/interpersonal.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/interpersonal.php">
                                <i class="fas fa-fw fa-plus-circle"></i> Personal Data
                            </a>
                        </div>
                        <div <?php getActive($base_path . 'user/academic.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/academic.php">
                                <i class="fas fa-fw fa-address-card"></i> Academic Qualification
                            </a>
                        </div>
                        <div <?php getActive($base_path . 'user/work.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/work.php">
                                <i class="fas fa-fw fa-cubes"></i> Working Experience
                            </a>
                        </div>
                        <div <?php getActive($base_path . 'user/computer.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/computer.php">
                                <i class="fas fa-fw fa-desktop"></i> Computer Literacy
                            </a>
                        </div>
                        <div <?php getActive($base_path . 'user/preview.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/preview.php">
                                <i class="fas fa-fw fa-print"></i> CV Preview
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Nav Item - Job application-->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#application"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list"></i>
                    <span> Job Application</span>
                </a>

                <div id="application" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-timetable py-2 collapse-inner rounded">
                        <div <?php getActive($base_path . 'user/allPost.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/allPost.php">
                                <i class="fas fa-fw fa-address-card"></i> View Posted Job
                            </a>
                        </div>
                        <div <?php getActive($base_path . 'user/result.php', $pagePath); ?>>
                            <a class="collapse-item" href="<?= $base_path; ?>user/result.php">
                                <i class="fas fa-fw fa-print"></i> Applications Result
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item" <?php getActive($base_path . 'user/result.php', $pagePath); ?>>
                <a class="nav-link" href=" <?= $base_path; ?>user/profile.php">
                    <i class=" fas fa-fw fa-user"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item" <?php getActive($base_path . 'user/chpassword.php', $pagePath); ?>>
                <a class="nav-link" href="<?= $base_path; ?>user/chpassword.php">
                    <i class=" fas fa-fw fa-key "></i>
                    <span>Change password</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= $base_path . 'logout.php'; ?>">
                    <i class=" fas fa-fw fa-sign-out-alt "></i>
                    <span>logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <strong> Welcome <?= ucfirst($userData['fName']) . " " . ucfirst($userData['lName']); ?></strong>
                    


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">