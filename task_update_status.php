<?php  session_start();
    include_once('dbConnection.php');
    include_once('myTimerConfig.php');

$taskId= $_REQUEST['taskid'];
$newStatus= $_REQUEST['newStatus'];

/*
IN_PROGRESS_BREAK
IN_PROGRESS_SPRINT
TODO
DONE
REVIEW
*/


$sql="UPDATE TASK SET TaskStatus='$newStatus' WHERE TaskID=$taskId;";

mysql_query($sql, $conn);


?>