<?php require "nav.php"  ?>
<div class="bg-white">
    <div class="row d-flex justify-content-center pt-3">
        <div class="col-xl-10">
            <?php
            include("dbconnect.php");

            $today = date('Y-m-d H:i:s');
            $query = "SELECT * FROM `jobpost` WHERE sdate <= '$today' and edate > '$today' ORDER BY sdate DESC";

            $run = mysqli_query($conn, $query);
            $row = mysqli_num_rows($run);
            if ($row > 0) {
                while ($post = mysqli_fetch_assoc($run)) {
                    echo '

                                    <div class="card p-3 mb-3 shadow-sm">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row align-items-center">
                                             <span>
                                                <small class="font-weight-bold text-primary">' . $post['jtitle'] . '</small> <br>

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
                    echo '<br>
                                                <small> ' . substr($post['jdescription'], 0, 510) . '</small>
                                                <br>
                                                <a class="btn btn-info btn-sm mt-2" href="openPost.php?jobPost=' . $post['postID'] . '" > <small class="clickable"> open post </small></a>
                                            </div>
                                        </div>
                                    </div>

                            ';
                }
            } else {
                echo "<h5 style='color:red; text-align:center;'> No job uploaded please wait</h5>";
            }
            ?>

        </div>
    </div>
</div>
</body>