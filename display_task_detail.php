<?php


$taskid = 'N/A';
if (isset($_REQUEST['taskid'])){
	$taskid = $_REQUEST['taskid'];
}

$title = 'Task Detail for Task ID: ' . $taskid;
include_once('header.php');

if (isset($_REQUEST['taskid'])) {


	include_once('dbConnection.php');

	?>
	<?php


	$sql = "SELECT TaskID, TaskName, TaskDetails, TaskDate, " .
		"TaskPriority,TaskStatus,TaskEmployeeID FROM TASK WHERE TaskID='$taskid'";
	$returnQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (" . __LINE__ . "): " . mysql_error() . '.');

	if ($taskReturned = mysql_fetch_assoc($returnQuery)) {
		$taskName = $taskReturned['TaskName'];
		$taskDetails = $taskReturned['TaskDetails'];
		$taskDate = $taskReturned['TaskDate'];
		$taskPriority = $taskReturned['TaskPriority'];
		$taskStatus = $taskReturned['TaskStatus'];
		$taskEmployeeID = $taskReturned['TaskEmployeeID'];




?>

		<h2>Task Name: <?=$taskName?></h2>
		<h3>Task Details: <?=$taskDetails?></h3>
		<h2>Task Date: <?=$taskDate?></h2>
		<h2>Task Priority: <?=$taskPriority?></h2>
		<h2>Task Status: <?=$taskStatus?></h2>
		<h2>Task Employee ID: <?=$taskEmployeeID?></h2>



<?php } else {
		?>

		<h2>No Task Details available for ID <?= $taskid ?></h2>
		<?php
	}
} else {
	?>

	<h2>No Task Details available because no Task ID was Set</h2>
<?php
}

?>

<?php include_once('footer.php'); ?>

</body>
</html>