<?php  session_start(); ?>
<?php

$email= $_REQUEST['email'];

include_once('dbConnection.php');
include_once ('myTimerConfig.php');

$sql="SELECT * FROM EMPLOYEE WHERE EmployeeEmail='$email'";
$returnQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

if($employeeRow = mysql_fetch_assoc($returnQuery ))
{
    $pw=$employeeRow['EmployeePW'];
    $emailMessage = "Your requested information is: $pw";
    $_SESSION['message']= "An email was sent to $email.";
    mail($email,"Requested Information",$emailMessage, "From: ICS414 Project <nicolemh@ics414.com>");
    header("Location: login_form.php");
}
else
{
    $_SESSION['message'] = "Sorry, $email isn't registered with MyTimer.";
    header("Location: forgot_form.php");
}

?>