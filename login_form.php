<?php
$title = 'Login';
include_once('header.php');
?>

<form style="margin-left:20px;" action = "login_validate.php" method = "get" name="login_form">

	<h2>Please Login to MyTimer</h2>
	<p>If you just registered, your login information is needed again.
		If you have not registered, please <a  class="btn btn-secondary" href="register_form.php">Register now</a></p>
	<hr/>
	<div class="form-group row">
		<label for="email" class="col-xs-2 form-control-label">Email </label>
		<div class="col-xs-4">
		<input type="email" name= "email" id="email" placeholder="Enter email" class="form-control" >
		</div>
		</div>


	<div class="form-group row">
		<label for="pw" class="col-xs-2 form-control-label">Password</label>
		<div class="col-xs-4">
		<input type="password" name="pw" id="pw" class="form-control" >
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-offset-2 col-xs-4">
			<button class = "btn btn-primary btn-block" type = "submit"
					name = "login">Login</button>
		</div>
		</div>

	</form>
<?php

?>



<?php include_once('footer.php'); ?>

</body>
</html>