<?php  session_start();
include_once('dbConnection.php');
include_once('myTimerConfig.php');

$taskid= $_REQUEST['taskid'];

$sql="UPDATE TASK SET TaskStatus='REVIEW' WHERE TaskID=$taskid;";

mysql_query($sql, $conn);

    $_SESSION['message'] = "Task ID $taskid was submitted for review.";
    header("Location: mainPage.php");


?>