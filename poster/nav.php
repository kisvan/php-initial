<?php require_once('../header.php');
$userData = $_SESSION['fyp_posterData'];
?>

<?php require_once('includes/sidebar.php') ?>
<!-- <div class="vertical-nav bg-white" id="sidebar">

    <div class="py-4 px-3 mb-4 bg-light">
        <div class="media d-flex align-items-center">
            <div class="media-body">
                <h5 class="text-primary text-center">
                    <strong><?= ucfirst($userData['fName']) . " " . ucfirst($userData['lName']); ?></strong>
                </h5>
                <div class="text-muted  text-center"><?= $userData['email']; ?></div>
            </div>

        </div>
    </div>
    <div>

    </div>
    <br>
    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Personal Details</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item <?php getActive($base_path . 'poster/poster.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>poster/poster.php" class="nav-link text-dark font-italic bg-light ">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Profile
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'poster/viewJobPost.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>poster/viewJobPost.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
                View job post
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'poster/addJobPost.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>poster/addJobPost.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Add job post
            </a>
        </li>

    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Settings</p>

    <ul class="nav flex-column bg-white mb-0">

        <li class="nav-item <?php getActive($base_path . 'poster/chpassword.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>poster/chpassword.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-key mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Change Password
            </a>
        </li>

        <li class="nav-item ">
            <a href="<?= $base_path . 'logout.php'; ?>" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Sign-Out
            </a>
    </ul>

    </nav>
</div> -->

<!-- End vertical navbar -->


<!-- Page content holder -->

<?php
function getActive($link, $pagePath)
{
    if ($link == $pagePath) :
        echo "active";
    endif;
}
?>