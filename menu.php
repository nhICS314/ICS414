<hr xmlns="http://www.w3.org/1999/html">

<nav class="navbar navbar-light " style="background-color: #e3f2fd;">
    <ul class="nav navbar-nav">

        <?php
        if (isset($_SESSION['id'])) {
            $name = $_SESSION['name'];
            echo '<li class="nav-item">';
            echo ' <a href="mainPage.php" class="nav-link">View Task Board</a> ';
            echo '</li>';

            /*
            echo '<li class="nav-item">';
            echo '  <a href="#" class="nav-link">Pomodoro Timer</a> ';
            echo '</li>';
            echo '<li class="nav-item">';
            echo '  <a href="#" class="nav-link">Settings</a> ';
            echo '</li>';
            */

        } else {
            ?>
            <li class="nav-item">
                <a class="nav-link" href="register_form.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forgot_form.php">Forgot Password</a>
            </li>
            <?php
        }
        ?>


        <li class="nav-item">
            <?php
            if (isset($_SESSION['id'])) {
                echo '<a   href="logout.php" class="btn btn-primary-outline">Logout</a>';
            } else {
                echo '<a   href="login_form.php" class="btn btn-primary-outline">Login</a>';
            }
            ?>
        </li>

    </ul>


</nav>


<hr>
