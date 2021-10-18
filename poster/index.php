<?php
include('../settings/connection.php');
include('../settings/sessions.php');
?>
<div class="body">
    <?php include('includes/sidebar.php'); ?>
    <div class="main_container">
        <div class="row">
            <div class="col-md-3 col-xl-3 col-xs-12">
                <div class="card shadow p-3 bg-success">
                    <div class="card-body border-success">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3 col-xs-12">
                <div class="card shadow p-3 bg-info">
                    <div class="card-body border-success">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3 col-xs-12">
                <div class="card shadow p-3 bg-danger">
                    <div class="card-body border-success">
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3 col-xs-12">
                <div class="card shadow p-3 bg-secondary">
                    <div class="card-body border-success">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</div>