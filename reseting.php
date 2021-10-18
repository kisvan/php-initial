<?php
 include("header.php");
?>
<body style="background-color: grey">
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
  }
</script>
<div class="container">
<div class="row justify-content-center">
<div class="p-5 col-xl-6" id="content" >
	<div class="card" style="text-align: center;">
	<div class="card-header" style="text-align: center; font-weight: bold;">Reseting Your Password</div>
	<div class="card-body">
   <form action="login.php" method="post">
      <div class="form-group"><input class="form-control" id="password" name="password" type="password" placeholder="Password" onkeyup="check()" minlength="8" required></div>
      <div class="form-group"><input class="form-control" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" onkeyup='check();' required>
      <span id='message'></span></div>
      <div class="form-group"><button type="submit" class="btn btn-info">Submit</button></div>
   </form>
  </div>
  </div>
  </div>
  </div>
</div>
</body>
<?php require_once('footer.php'); ?>
