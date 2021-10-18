<?php 
require_once('../header.php'); 
$pagePath =  $base_path."user/about.php";

if(!isset($_SESSION['fyp_userData'])){
  header("location:".$base_path."login.php");
}

?>

<body style="background-color: grey">
<?php include("nav.php");?>
<div class="page-content p-5" id="content" >
	<div class="card" style="text-align: center;">
		<div class="card-header" style="text-align: center; font-weight: bold;">About Us</div>
		<div class="card-body">
			<form action="#" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<div class="form-group">
					
                    
				</div>
			</form>		
		</div>
	</div>
</div>
</body>
<?php require_once('../footer.php'); ?>