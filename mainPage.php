
<?php
$title = 'MyTimer Main Page';
include_once('header.php');
include_once('dbConnection.php');

?>

<?php
$email = '';
if (isset($_SESSION['email']))
{$email=$_SESSION['email'];}

$pw = '';
if (isset( $_SESSION['pw']))
{$pw = $_SESSION['pw'];}


$message='';
$status='';

$sql="SELECT * FROM EMPLOYEE WHERE EmployeeEmail='$email' AND EmployeePW='$pw'";
$EmployeeQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

$sql="SELECT * FROM tasks";
$TaskQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

if($registration = mysql_fetch_assoc($EmployeeQuery))
{
	$name=$registration['EmployeeName'];
?>


        <h1>Hello <?php echo $name; ?>!<BR></h1>
        <p>Welcome to MyTimer</p>

        <h2><a class="btn btn-primary btn-lg" href="add_task.php">Click here to add a task</a></h2>

        <br><br>

        <?php
            while ($entry = mysql_fetch_array($TaskQuery))
            {
        ?>
                <h6>Task Name:</h6>
                <p><?php echo $entry["taskName"] ?></p>
                <h6>Task Details:</h6>
                <p><?php echo $entry["taskDetails"] ?></p>
                <h6>Task Date:</h6>
                <p><?php echo $entry["taskDate"] ?></p>
                <h6>Task Priority:</h6>
                <p><?php echo $entry["taskPriority"] ?></p>
                <h6>Task assigned to:</h6>
                <p><?php echo $entry["taskEmployee"] ?></p>
        <?php
            }
        ?>


	<?php
		$logLink='Logout';
}
else
{
?>


	<h1>Welcome to MyTimer!</h1>
	<br><br>
	<p>To user MyTimer please  <a class="btn btn-secondary" href="register_form.php">register</a> or <a class="btn btn-primary" href="login_form.php">log in</a>.</p>

            <?php include_once('footer.php'); ?>

        </body>
    </html>