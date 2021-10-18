<?php
include("../dbconnect.php");
if (isset($_SESSION['fyp_posterData'])) {
    $email = $_SESSION['fyp_posterData']['email'];

    $query = "SELECT jobpost.*, category.cat_name, category.cat_id, level.level_name, level.level_id FROM jobpost, category, level
    WHERE jobpost.pcategory = category.cat_id
    AND jobpost.elevel = level.level_id";
    $run = mysqli_query($conn, $query);
    $row = mysqli_num_rows($run);

    if ($row > 0) {
        $x = 1;
        while ($post = mysqli_fetch_assoc($run)) {
            echo '
                    <tr>
                        <td>' . $x++ . '</td>
                        <td>' . $post['jtitle'] . '</td>
                        <td>' . $post['employer'] . '</td>
                        <td>' . $post['cat_name'] . '</td>
                        <td>' . date('d M, Y', strtotime($post['sdate'])) . '</td>
                        <td>' . date('d M, Y', strtotime($post['edate'])) . '</td>
                        <td>';
            if (time() > strtotime($post['edate'])) :
                echo '<span class="text-danger">Expired</span>';
            elseif (time() < strtotime($post['sdate'])) :
                echo '<span class="text-primary">Pending</span>';
            else :
                echo '<span class="text-success">Onprogress</span>';
            endif;

            echo    '</td>
                        <td class="text-center text">
                        <a class="text-success" href="openJobPost.php?jobPost=' . $post['postID'] . '"> 
                            <i class="fa fa-eye fa-1x fa-lg"></i> 
                        </a>
                        <a class="text-warning" href="EditJobPost.php?jobPost=' . $post['postID'] . '"> 
                            <i class="fa fa-edit fa-1x fa-lg fa-fw"></i> 
                        </a>
                        </td>
                    </tr>
                ';
        }
    } else {
        echo "No Data posted";
    }
} else {
    header("location:login.php");
}