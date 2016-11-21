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

<a class="btn btn-secondary" href="mainPage.php">Back to Task Board</a>

<?php

/*
IN_PROGRESS_BREAK
     IN_PROGRESS_SPRINT
     TODO
     DONE
     REVIEW
*/

if (strcmp($taskStatus,'DONE') == 0){ // same for IN_PROGRESS
    // just show main page button
} else if (strcmp($taskStatus,'REVIEW') == 0 ){
    ?>

    <a class="btn btn-primary" href="mark_complete_validate.php?taskid=<?=$taskid?>">Mark As Completed</a>
    <?php

} else if (strcmp($taskStatus,'TODO' ) == 0 ){
    ?>
    <a class="btn btn-primary" href="pomodoro.php?taskid=$taskid">Select Task</a>
    <?php
}


// <a class="btn btn-primary" href="login_form.php">log in</a>

?>

<?php include_once('footer.php'); ?>

</body>
</html>