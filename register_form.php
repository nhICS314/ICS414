<?php
$title = 'Register';
include_once('header.php');
include_once('dbConnection.php');

?>


<form style="margin-left:20px;" method="get" action="register_validate.php">

	<h2>Please Register</h2>
	<div class="form-group row">
		<label for="FullName" class="col-xs-2 form-control-label">Name: </label>
		<div class="col-xs-4">
			<input type="text" id="FullName" placeholder="Full name" class="form-control" name="FullName" >
		</div>
	</div>

	<div class="form-group row">
		<label for="Email" class="col-xs-2 form-control-label">Email: </label>
		<div class="col-xs-4">
			<input type="email" id="Email" placeholder="email@example.com" class="form-control" name="Email" >
		</div>
	</div>

	<div class="form-group row">
		<label for="Password" class="col-xs-2 form-control-label">Password: </label>
		<div class="col-xs-4">
			<input type="password" id="Password" class="form-control" name="Password">
		</div>
	</div>

	<div class="form-group row">
		<label for="Password2" class="col-xs-2 form-control-label">Team Role: </label>
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-primary active">
				<input type="radio" name="role" id="DeveloperRole" value="Developer" autocomplete="off" checked> Developer
			</label>
			<label class="btn btn-primary">
				<input type="radio" name="role" id="ManagerRole" value="Manager" autocomplete="off"> Manager
			</label>
		</div>
	</div>

	<div class="form-group row">
		<div class="col-xs-offset-2 col-xs-4">
			<button class = "btn btn-primary btn-block" type = "submit"
					name = "register">Register Me</button>
		</div>
	</div>
</form>


<?php include_once('footer.php'); ?>

</body>
</html>