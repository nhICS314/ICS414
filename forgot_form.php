<?php

$title = 'Forgot Password';

include_once('header.php');
include_once('dbConnection.php');
include_once ('myTimerConfig.php');
?>



<form style="margin-left:20px;" action = "forgot_validate.php" method = "get" name="forgot_form">

	<h2>Email me my password.</h2>
	<div class="form-group row">
		<label for="email" class="col-xs-2 form-control-label">Email </label>
		<div class="col-xs-4">
			<input type="email" name="email" id="email" placeholder="Enter email" class="form-control" >
		</div>
	</div>
	<div class="form-group row">
		<div class="col-xs-offset-2 col-xs-4">
			<button class = "btn btn-primary btn-block" type = "submit"
					name = "forgot">Email my password</button>
		</div>
	</div>
</form>



<?php include_once('footer.php'); ?>

</body>
</html>