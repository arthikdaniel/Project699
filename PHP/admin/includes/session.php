<?php
$login_id = '';
$login_role = '';
$student_id = '';
session_start(); //start the PHP_session function
?>

<div class="col-6" align="right">
    <?php
    if (isset($_SESSION['login_id']) && isset($_SESSION['login_role'])) {
        $login_id = $_SESSION['login_id'];
        $login_role = $_SESSION['login_role'];
        $full_name = $_SESSION['full_name'];
        if ($login_role == "student") {
            $student_id = $_SESSION['student_id'];
        }
        echo 'Welcome '.$full_name.'<br>';
        echo 'Logged in as: <strong>' . $login_role . '</strong> <br>';
        echo '<a href="../../login.php"  class="btn btn-sm btn-success ">Logout</a>';
    } else {
        //Redirect to Login
        session_destroy();
        header("location:../login.php");
        echo '<a href="../../login.php"  class="btn btn-sm btn-success ">Login/Register</a>';
    }
    ?>
</div>
