<?php
require_once('../header.php');
$pagePath =  $base_path . "user/feedback.php";

if (!isset($_SESSION['fyp_userData'])) {
	header("location:" . $base_path . "login.php");
}

?>


<body style="background-color: grey">

    <?php include("nav.php"); ?>
    <div class="page-content p-5" id="content">
        <div class="card" style="text-align: center;">
            <div class="card-header" style="text-align: center; font-weight: bold;">Feedbacks</div>
            <div class="card-body">
                <form action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>We Would Like To See Your Contribution InTerm Of Feedbacks</label>

                    </div>
                    <textarea placeholder="Comment Here"></textarea>
                    <div class="form-group"><button style="background-color: green;" type="submit"
                            class="btn btn-primary">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</body>