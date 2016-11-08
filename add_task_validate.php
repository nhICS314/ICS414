<?php
    session_start();
    include_once('dbConnection.php');
    include_once('myTimerConfig.php');

    $name= $_REQUEST['Name'];
    $details= $_REQUEST['Details'];
    $date= $_REQUEST['Date'];
    $priority= $_REQUEST['Priority'];
    $employee= $_REQUEST['EmployeeID'];


    $sql="INSERT INTO TASK SET TaskName='$name', TaskDetails='$details', TaskDate='$date', TaskStatus='TODO', TaskPriority='$priority', TaskEmployeeID='$employee'";
    $insertQuery=mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

    $_SESSION['message'] = "Task: \"$name\" added.";
    header("Location: mainPage.php");

?>
