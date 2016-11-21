
<?php
$title = 'MyTimer Pomodoro Page';
include_once('header.php');
include_once('dbConnection.php');

?>

<?php
$taskid = 'N/A';
$taskName = '';
$taskDetails = '';
if (isset($_REQUEST['taskid'])){
    $taskid = $_REQUEST['taskid'];
} else {
    $taskName = 'No ID given';
    $taskDetails = 'No ID given';
}
$title = 'Task Detail for Task ID: '.$taskid;
if (isset($_REQUEST['taskid'])) {
    ?>
    <?php
    $sql = "SELECT TaskName, TaskDetails FROM TASK WHERE TaskID='$taskid'";
    $returnQuery = @mysql_query($sql, $conn) or die("Couldn't perform query $sql (" . __LINE__ . "): " . @mysql_error() . '.');

    if ($taskReturned = @mysql_fetch_assoc($returnQuery)) {
        $taskName = $taskReturned['TaskName'];
        $taskDetails = $taskReturned['TaskDetails'];
    }else {
        $taskName = 'No Task Returned for ID given' . $taskid;
        $taskDetails = 'No Task Returned for ID given' . $taskid;
    }
}?>


<!--    <link rel="stylesheet" type="text/css" href="pom.css" /> -->

<form style="margin-left:20px;" action="login_validate.php" method="get" name="login_form">





<DIV style="height:300px">
    <h2>Focus On Your Task With a Pomodoro</h2>

<div id="task" class="col-xs-4">
    <h3>Task Details</h3>

    <h4>Task Name: <?= $taskName;?></h4>

    <p>Task Details: <?= $taskDetails; ?></p>
    <p>Task ID: <span id="taskId"><?= $taskid;?></span></p>
</div>
<div id="container" class="col-xs-4">
    <div id="timer" >
        <span id="minutes">25</span>
        <span id="middle">:</span>
        <span id="seconds">00</span>
        <span id="message"></span>
    </div>

     <div id="buttons">
         <a  class="btn btn-primary" href="#start" id="start">Start</a> |
         <a  class="btn btn-secondary disabled" href="#stop" id="stop">Pause</a> |
         <a  class="btn btn-secondary disabled" href="#reset" id="reset">Reset</a>
        <!--<br/><br/>
        <button id="settings">settings</button>-->
        <br/><br/>
         <a  class="btn btn-secondary" href="submit_for_review_validate.php?taskid=<?= $taskid ?>" id="review">Submit for Review</a>
    </div>
</div>
</DIV>

</form>
<script type="text/javascript" src="pom.js"></script>


<?php include_once('footer.php'); ?>

</body>
</html>