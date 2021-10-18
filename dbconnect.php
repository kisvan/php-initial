<?php
@session_start();
$host = "localhost";
$user = 'root';
$pass = '';
$db = 'applicant';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    exit("<h3 style='text-align:center; color:rgba(150,0,0,0.5);'> Fail to connect with database </h3>");
}