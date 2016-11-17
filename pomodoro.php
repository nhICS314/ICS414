<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="pom.css" />
    <title>Pomodoro</title>
</head>
<body>

<div id="task">
    <u>Task Details</u>
    <?php
    $task = 'N/A';
    if (isset($_REQUEST['task'])){
        $taskid = $_REQUEST['task'];
    }
    $title = 'Task Detail for Task ID: '.$task;
    if (isset($_REQUEST['task'])) {
        include_once('dbConnection.php');
        ?>
        <?php
        $sql = "SELECT TaskName, TaskDetails FROM TASK WHERE TaskID='$task'";
        $returnQuery = @mysql_query($sql, $conn) or die("Couldn't perform query $sql (" . __LINE__ . "): " . @mysql_error() . '.');

        if ($taskReturned = @mysql_fetch_assoc($returnQuery)) {
            $taskName = $taskReturned['TaskName'];
            $taskDetails = $taskReturned['TaskDetails'];
        }
    }?>
    <p>Task Name: <? echo $taskName;?><br/>
    Task Details: <? $taskDetails; ?></p>
</div>
<div id="container">
    <div id="timer">
        <span id="minutes">25</span>
        <span id="middle">:</span>
        <span id="seconds">00</span>
        <span id="message"></span>
    </div>

     <div id="buttons">
        <button id="start">start</button>
        <button id="stop">stop</button>
        <button id="reset">reset</button>
        <br/><br/>
        <button id="settings">settings</button>
        <br/><br/>
        <button id="rev">submit for review</button>
    </div>
</div>

<script type="text/javascript" src="pom.js"></script>
</body>
</html>