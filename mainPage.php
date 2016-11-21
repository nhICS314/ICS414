
<?php
$title = 'MyTimer Main Page';
include_once('header.php');
include_once('dbConnection.php');

?>

<?php
$email = '';
if (isset($_SESSION['email']))
{$email=$_SESSION['email'];}

$pw = '';
if (isset( $_SESSION['pw']))
{$pw = $_SESSION['pw'];}


$message='';
$status='';

// Used to create a query to check if user is logged in
$sql="SELECT * FROM EMPLOYEE WHERE EmployeeEmail='$email' AND EmployeePW='$pw'";
$EmployeeUserQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

// Used to return tasks labeled as TODO
$sql="SELECT * FROM TASK WHERE TaskStatus='TODO'";
$ToDoTaskQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

// Used to return tasks that are IN PROGRESS
$sql="SELECT * FROM TASK WHERE TaskStatus like 'IN_PROGRESS%'";
$InProgressTaskQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

// Used to return tasks that are in REVIEW
$sql="SELECT * FROM TASK WHERE TaskStatus='REVIEW'";
$ReviewTaskQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

// Used to return tasks that are COMPLETE
$sql="SELECT * FROM TASK WHERE TaskStatus='DONE'";
$CompleteTaskQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

// If user is logged in, they can view the task board
if($registration = mysql_fetch_assoc($EmployeeUserQuery))
{
	$name=$registration['EmployeeName'];
?>
	<div class="topBar">
		<h1>Hello <?php echo $name; ?>!<BR></h1>
		<div class="row">
			<div class="col-xs-12 col-md-3">
				<div class="addTask">
					<a class="btn btn-primary btn-lg" href="add_task.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="col-xs-12 col-md-3">
			</div>
			<div class="col-xs-12 col-md-3">
			</div>
			<div class="col-xs-12 col-md-3">
			</div>
		</div>
	</div>
	<div class="taskContainer">
		<div class="row">
			<div class="col-xs-12 col-md-3 todo">
				<h1 class="taskTitle">TODO</h1>
				<?php
					while ($entry = mysql_fetch_array($ToDoTaskQuery))
					{
						$name = $entry["TaskEmployeeID"];
						// Used to acquire all Employee names
						$sql="SELECT * FROM EMPLOYEE WHERE EmployeeID='$name'";
						$EmployeeNameQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');
						$name = mysql_fetch_array($EmployeeNameQuery)
				?>
			  		<div class="taskBlock">
				  		<h4><?=$entry["TaskName"] ?></h4>
						<hr />
						<p><?php echo $entry["TaskDetails"] ?></p>
						<hr />
						<div class="taskBlockBot">
							<div class="taskBlockBotL">
								<i class="fa fa-user" aria-hidden="true"></i> <?php echo $name["EmployeeName"] ?>
							</div>
							<div class="taskBlockBotR">
								<a class="btn btn-secondary btn-md" href="display_task_detail.php?taskid=<?=$entry["TaskID"] ?>"><i class="fa fa-eye" style="font-size:20px;" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
			<div class="col-xs-12 col-md-3 inProgress">
				<h1 class="taskTitle">IN PROGRESS</h1>
				<?php
					while ($entry = mysql_fetch_array($InProgressTaskQuery))
					{
						$name = $entry["TaskEmployeeID"];
						// Used to acquire all Employee names
						$sql="SELECT * FROM EMPLOYEE WHERE EmployeeID='$name'";
						$EmployeeNameQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');
						$name = mysql_fetch_array($EmployeeNameQuery)
				?>
			  		<div class="taskBlock">
						<h4><?=$entry["TaskName"] ?></h4>
						<hr />
						<p><?php echo $entry["TaskDetails"] ?></p>
						<p><?php echo $entry["TaskStatus"] ?></p>
						<hr />
						<div class="taskBlockBot">
							<div class="taskBlockBotL">
								<i class="fa fa-user" aria-hidden="true"></i> <?php echo $name["EmployeeName"] ?>
							</div>
							<div class="taskBlockBotR">
								<a class="btn btn-secondary btn-md" href="display_task_detail.php?taskid=<?=$entry["TaskID"] ?>"><i class="fa fa-eye" style="font-size:20px;" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
			<div class="col-xs-12 col-md-3 review">
				<h1 class="taskTitle">REVIEW</h1>
				<?php
					while ($entry = mysql_fetch_array($ReviewTaskQuery))
					{
						$name = $entry["TaskEmployeeID"];
						// Used to acquire all Employee names
						$sql="SELECT * FROM EMPLOYEE WHERE EmployeeID='$name'";
						$EmployeeNameQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');
						$name = mysql_fetch_array($EmployeeNameQuery)
				?>
			  		<div class="taskBlock">
						<h4><?=$entry["TaskName"] ?></h4>
						<hr />
						<p><?php echo $entry["TaskDetails"] ?></p>
						<hr />
						<div class="taskBlockBot">
							<div class="taskBlockBotL">
								<i class="fa fa-user" aria-hidden="true"></i> <?php echo $name["EmployeeName"] ?>
							</div>
							<div class="taskBlockBotR">
								<a class="btn btn-secondary btn-md" href="display_task_detail.php?taskid=<?=$entry["TaskID"] ?>"><i class="fa fa-eye" style="font-size:20px;" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
			<div class="col-xs-12 col-md-3 complete">
				<h1 class="taskTitle">COMPLETE</h1>
				<?php
					while ($entry = mysql_fetch_array($CompleteTaskQuery))
					{
						$name = $entry["TaskEmployeeID"];
						// Used to acquire all Employee names
						$sql="SELECT * FROM EMPLOYEE WHERE EmployeeID='$name'";
						$EmployeeNameQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');
						$name = mysql_fetch_array($EmployeeNameQuery)
				?>
			  		<div class="taskBlock">
						<h4><?=$entry["TaskName"] ?></h4>
						<hr />
						<p><?php echo $entry["TaskDetails"] ?></p>
						<hr />
						<div class="taskBlockBot">
							<div class="taskBlockBotL">
								<i class="fa fa-user" aria-hidden="true"></i> <?php echo $name["EmployeeName"] ?>
							</div>
							<div class="taskBlockBotR">
							<a class="btn btn-secondary btn-md" href="display_task_detail.php?taskid=<?=$entry["TaskID"] ?>"><i class="fa fa-eye" style="font-size:20px;" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>

	</div>






	<?php
		$logLink='Logout';
}
else { // If user is not logged in, they will be prompted to do so or register
	?>


	<h1>Welcome to MyTimer!</h1>
	<br><br>
	<p>To user MyTimer please <a class="btn btn-secondary" href="register_form.php">register</a> or <a
			class="btn btn-primary" href="login_form.php">log in</a>.</p>


	<?php
}
?>

<?php include_once('footer.php'); ?>

</body>
</html>
