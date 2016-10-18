<?php  session_start(); ?>
<?php include_once('dbConnection.php'); ?>

<html>
<head>
<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">

</head>
<body>
<?php include('menu.php'); ?>

<form style="margin-left:20px;" method="get" action="register_validate.php">

	<h1>Please Register</h1>
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