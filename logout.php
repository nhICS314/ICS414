<?php session_start();
$name=$_SESSION['name'];
session_unset();
session_destroy();
session_start();
$_SESSION['message'] = "$name is now logged out with MyTimer. Please login to continue.";
header("Location: login_form.php");
?>