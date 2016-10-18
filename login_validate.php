<?php  session_start(); ?>
<?php

$email= $_REQUEST['email'];
$pw= $_REQUEST['pw'];

include_once('dbConnection.php');

$sql="SELECT * FROM EMPLOYEE WHERE EmployeeEmail='$email' AND EmployeePW='$pw'";
$returnQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

if($employeeRow = mysql_fetch_assoc($returnQuery ))
{
    $_SESSION['email']=$email;
    $_SESSION['pw']=$pw;
    $_SESSION['name']=$employeeRow['EmployeeName'];
    $_SESSION['id']=$employeeRow['EmployeeID'];
    $_SESSION['message']= "Login Successful!";
    header("Location: mainPage.php");
}
else
{
    $_SESSION['message'] = "Sorry, $email isn't registered with MyTimer or your password was incorrect.";
    header("Location: login_form.php");
}

?>