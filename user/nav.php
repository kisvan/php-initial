<?php require_once('sidebar.php') ?>
<!-- <div class="vertical-nav bg-white overflow-auto" id="sidebar">

    <div class="py-2 px-1 mb-1 bg-light">
        <div class="media d-flex align-items-center">
            <img src="profile.jpg" alt="..." width="100" height="150"
                class="mr-4 rounded-circle img-thumbnail shadow-md">
        </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-2 mb-0">Personal Details</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item <?php getActive($base_path . 'user/dashboard.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/dashboard.php" class="nav-link text-dark font-italic bg-light ">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/interpersonal.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/interpersonal.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-user mr-3 text-primary fa-fw"></i>
                Personal data
            </a>
        </li>
        
        <li class="nav-item <?php getActive($base_path . 'user/academic.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/academic.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                Academic Qualification
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/work.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/work.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-cubes mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Working Experiance
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/computer.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/computer.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-desktop mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Computer Literacy
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/preview.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/preview.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-print mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                CV Preview
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/allPost.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/allPost.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-user mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Apply Job
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/result.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/result.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-user mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Selection Result
            </a>
        </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-2 mb-0">Settings</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item <?php getActive($base_path . 'user/about.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/about.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-users mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                About Us
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/contact.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/contact.php" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-id-badge mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Contact Us
            </a>
        </li>
        <li class="nav-item <?php getActive($base_path . 'user/chpassword.php', $pagePath); ?>  ">
            <a href="<?= $base_path; ?>user/chpassword.php" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-key mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Change Password
            </a>
        </li>

        <li class="nav-item ">
            <a href="<?= $base_path . 'logout.php'; ?>" class="nav-link text-dark font-italic bg-light">
                <i class="fas fa-sign-out-alt mr-3 text-primary fa-fw" style="color:dodgerblue"></i>
                Sign-Out
            </a>
        </li>
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