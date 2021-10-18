<?php
require_once('../header.php');
require_once('../dbconnect.php');
$pagePath =  $base_path . "user/work.php";

if (!isset($_SESSION['fyp_userData'])) {
    header("location:" . $base_path . "login.php");
}

$userData = $_SESSION['fyp_userData'];
?>
<?php
// Uploads files
if (isset($_POST['upload'])) { // if save button on the form is clicked

    $user_id = $_SESSION['user_id'];

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // create usnique file name by adding userid to eachfilename
    $filename = $user_id . $filename;

    // destination of the file on the server
    $destination = '../img/profile/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['PNG', 'png', 'JPG', 'jpg'])) {
        $_SESSION['error'] = "You file extension must be .jpg or .png ";
        header('location:poster.php');
    }

    // file shouldn't be larger than 1Megabyte
    elseif ($_FILES['myfile']['size'] > 1000000) {
        $_SESSION['error'] = "File too large!";
        header('location:poster.php');
    }

    //move file to directory
    else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $sql = "INSERT INTO profile VALUES (NULL, '$filename', '$user_id');";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['success'] = "Image uploaded and data saved successfuly";
                header('location:poster.php');
            } else {
                $_SESSION['error'] = "Image uploaded and data not saved successfuly";
                header('location:poster.php');
            }
        } else {
            $_SESSION['error'] = "Image not uploaded and data not saved successfuly";
            header('location:poster.php');
        }
    }
}

//update
elseif (isset($_POST['update'])) { // if save button on the form is clicked

    $id = $_POST['id'];

    $user_id = $_SESSION['user_id'];

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // create usnique file name by adding userid to eachfilename
    $filename = $user_id . $filename;

    // destination of the file on the server
    $destination = '../img/profile/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['PNG', 'png', 'JPG', 'jpg'])) {
        $_SESSION['error'] = "You file extension must be .jpg or .png ";
        header('location:poster.php');
    }

    // file shouldn't be larger than 1Megabyte
    elseif ($_FILES['myfile']['size'] > 1000000) {
        $_SESSION['error'] = "File too large!";
        header('location:poster.php');
    }

    //move file to directory
    else {

        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $sql = "UPDATE profile SET image = '$filename' WHERE profile_id = '$id';";
            if (mysqli_query($conn, $sql)) {
                // echo "success";
                $_SESSION['success'] = "Image Updated and data saved successfuly";
                header('location:poster.php');
            } else {
                $_SESSION['error'] = "Image Updated and data not saved successfuly";
                header('location:poster.php');
                // echo "error1";
            }
        } else {
            // echo "error";
            $_SESSION['error'] = "Image not Updated and data not saved successfuly";
            header('location:poster.php');
        }
    }
}