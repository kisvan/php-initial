 <?php
    @session_start();
    $GLOBALS['base_path'] = "http://localhost/fyp/";
    ?>

 <!DOCTYPE html>
 <html>

 <head>
     <title>Home</title>
     <!-- <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/navigator.css"> -->
     <link rel="stylesheet" href="<?= $base_path; ?>includes/css/min.css">
     <link rel="stylesheet" href="<?= $base_path; ?>includes/css/all.css"
         integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap.bundle.min.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/fontawesome.min.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap-grid.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap-grid.css.map">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap-grid.min.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/bootstrap-grid.min.css.map">


     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="<?= $base_path; ?>includes/css/responsive.bootstrap4.min.css ">


     <style>
     .active {
         font-weight: bold;
         border: 0.3px solid #9cf9f3;
         box-shadow: 1px, 2px, 1px black;
     }
     </style>

 </head>