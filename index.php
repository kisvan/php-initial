<?php
@session_start();
$GLOBALS['base_path'] = "http://localhost/fyp/";
?>

<body>
    <?php require "nav.php"  ?>
    <div class="bg-white">
        <div class="row pt-5 p-2">
            <div class="col-xl-7">
                <div style="max-width: 100%;">
                    <img src="img/job.jpg" alt="" width="100%">
                </div>
                <div class="card card-body">
                    <h3>APPLICATION TIPS</h3>
                    <p>System offer your to view job and it description including number of required Applicants
                        start date and end date of application and many other description. There before start any thing
                        plaese follow the following steps</p>

                    <p><b>Step 1: Create account if you do not have</b><br>
                        make sure you fill the form with valid data otherwise you will loose the chance to have a job
                        If you have account you can click login on navigation bar or <a href="login.php">Click here</a>
                    </p>
                    <p>
                        <b>Step 2:</b> After login for the first time make sure you complete your profile with valid
                        data to generate your virtual cv
                    </p>

                </div>
            </div>
            <div class="col-md-5">
                <h4 class="text-center text-dark">JOB POST</h4>
                <hr>
                <?php
                include("dbconnect.php");

                $today = date('Y-m-d H:i:s');
                $query = "SELECT `jobpost`.*, `category`.* FROM `jobpost`
                            INNER JOIN `category` ON `category`.`cat_id` = `jobpost`.`pcategory` 
                            WHERE sdate <= '$today' and edate > '$today' ORDER BY sdate DESC LIMIT 6";

                $run = mysqli_query($conn, $query);
                $row = mysqli_num_rows($run);
                if ($row > 0) {
                    while ($post = mysqli_fetch_assoc($run)) {
                        echo '

                                    <div class="card card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center">
                                             <span>
                                                <small class="font-weight-bold text-danger">' . $post['jtitle'] . '</small> <br>

                                             </span>
                                            </div> <small> <span class="text-muted"> ' . date('d F. Y', strtotime($post['sdate'])) . '</span></small>
                                        </div>
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <div class="reply">
                                                <small>' . $post['cat_name'] . '</small><br>';
                        if (time() > strtotime($post['edate'])) :
                            echo 'Status : <small class="text-danger"> application closed </small>';
                        elseif (time() < strtotime($post['sdate'])) :
                            echo 'Status : <small class="text-primary"> not start</small>';
                        else :
                            echo 'Status : <small class="text-success"> application continue</small>';
                        endif;
                        echo '<br>
                                                <small> ' . substr($post['jdescription'], 0, 510) . '</small>
                                                <br>
                                                <a class="btn btn-dark btn-sm mt-2" href="openPost.php?jobPost=' . $post['postID'] . '" > <small class="clickable"> open post </small></a>
                                            </div>
                                        </div>
                                    </div>

                            ';
                    }
                } else {
                    echo "<h5 style='color:red; text-align:center;'> No job uploaded please wait</h5>";
                }
                ?>
                <a class="btn btn-sm btn-outline-dark mt-3" href="post.php"> view All Post</a>
            </div>
        </div>
    </div>
</body>