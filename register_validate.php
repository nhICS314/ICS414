<?php  session_start();
    include_once('dbConnection.php');
    include_once('myTimerConfig.php');

$email= $_REQUEST['Email'];
$pw= $_REQUEST['Password'];
$name= $_REQUEST['FullName'];
$role= $_REQUEST['role'];

$sql="SELECT * FROM EMPLOYEE WHERE EmployeeEmail='$email'";
$returnQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

if($registration = mysql_fetch_assoc($returnQuery ))
{
    $EmployeeName=$registration['EmployeeName'];
    $_SESSION['message'] = "$EmployeeName with email $email is already registered at MyTimer.";
    header("Location: login_form.php");
}
else
    {
        $sql="INSERT INTO EMPLOYEE SET EmployeeName='$name', EmployeeEmail='$email', EmployeePW='$pw', EmployeeRole='$role'";
        $insertQuery=mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');
        mail(constant("adminEmail"),"$name Registered",$message, "From: $name <$email>");
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['pw']=$pw;
        $_SESSION['role']=$role;
        $_SESSION['message'] = "$name with email $email is now registered with MyTimer.";
        header("Location: mainPage.php");

}


?>