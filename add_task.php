<?php  session_start(); ?>
<?php include_once('dbConnection.php'); ?>
<?php
$sql="SELECT * FROM EMPLOYEE";
$returnQuery = mysql_query($sql, $conn) or die("Couldn't perform query $sql (".__LINE__."): " . mysql_error() . '.');

?>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
</head>
<body>
<?php include('menu.php'); ?>

<form style="margin-left:20px;" method="get" action="add_task_validate.php">

    <h1>Add Task</h1>
    <div class="form-group row">
        <label for="Name" class="col-xs-2 form-control-label">Name: </label>
        <div class="col-xs-4">
            <input type="text" id="Name" placeholder="Task name" class="form-control" name="Name" >
        </div>
    </div>

    <div class="form-group row">
        <label for="Details" class="col-xs-2 form-control-label">Details: </label>
        <div class="col-xs-4">
            <textarea id="Details" placeholder="" class="form-control" name="Details" ></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="Date" class="col-xs-2 form-control-label">Due Date: </label>
        <div class="col-xs-4">
            <input type="date" id="Date" class="form-control" name="Date">
        </div>
    </div>


    <div class="form-group row">
        <label for="Priority" class="col-xs-2 form-control-label">Priority: </label>
        <div class="btn-group col-xs-4" data-toggle="buttons">
            <label class="btn btn-primary">
                <input type="radio" name="Priority" id="PriorityLow" value="Low" autocomplete="off" > Low
            </label>
            <label class="btn btn-primary active">
                <input type="radio" name="Priority" id="PriorityMed" value="Medium" autocomplete="off" checked> Medium
            </label>
            <label class="btn btn-primary">
                <input type="radio" name="Priority" id="PriorityHigh" value="High" autocomplete="off"> High
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label for="EmployeeName" class="col-xs-2 form-control-label">Employee: </label>
        <div class="col-xs-4">
            <select class="form-control" name="EmployeeID">
                <?php
                while ($entry = mysql_fetch_array($returnQuery))
                {

                    ?>
                    <option value="<?php echo $entry["EmployeeID"] ?>"><?php echo $entry["EmployeeName"] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xs-offset-2 col-xs-4">
            <button class = "btn btn-primary btn-block" type = "submit" name = "add_task">Add Task</button>
        </div>
    </div>
</form>

<?php include_once('footer.php'); ?>

</body>
</html>
