<?php
require_once('../header.php');
$pagePath =  $base_path . "user/allPost.php";

include("../dbconnect.php");
require_once('../header.php');
if (isset($_SESSION['fyp_userData'])) {
    $today = date('Y-m-d H:i:s');
    $query = "SELECT * FROM `jobpost` WHERE sdate <= '$today' and edate > '$today' ORDER BY sdate DESC";

    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run); ?>
<?php include("nav.php"); ?>


<div class="card">
    <div class="card-header bg-timetable text-center">
        <h4>Jobs</h4>
    </div>
    <div class="card-body">
        <?php if ($row > 0) {
            while ($post = mysqli_fetch_assoc($run)) {
                echo '
                
                        <div class="card p-3 mt-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center"> 
                                 <span>
                                    <small class="font-weight-bold text-primary">' . $post['jtitle'] . '</small> <br>
                                    <small class="font-weight-bold">job offered by :  <span class="text-muted"> ' . $post['employer'] . ' </span> </small>
                                 </span> 
                                </div> <small> <span class="text-muted"> ' . date('d F. Y', strtotime($post['sdate'])) . '</span></small>
                            </div>
                            <div class="action d-flex justify-content-between mt-0 align-items-center">
                                <div class="reply">
                                    <small>'  . '</small><br>';
                if (time() > strtotime($post['edate'])) :
                    echo 'Status : <small class="text-danger"> application closed </small>';
                elseif (time() < strtotime($post['sdate'])) :
                    echo 'Status : <small class="text-primary"> not start</small>';
                else :
                    echo 'Status : <small class="text-success"> application continue</small>';
                endif;
                echo '<br>Description :
                                    <small> ' . substr($post['jdescription'], 0, 510) . '</small>
                                    <br>
                                    <a class="btn btn-dark btn-sm mt-2 text-link" href="openPost.php?jobPost=' . $post['postID'] . '" > <small class="clickable" > open post </small></a>
                                </div>
                            </div>
                        </div>
                        
                ';
            }
        } else {
            echo "<h5 style='color:red; text-align:center;'> No job uploaded please wait</h5>";
        }
    } else {
        header("location:login.php");
    } ?>
    </div>
</div>
<?php require_once('footer.php'); ?>
<?php require_once('../footer.php'); ?>
</div>
</div>