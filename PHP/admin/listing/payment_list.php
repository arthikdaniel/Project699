<?php  include "../includes/mainheader.php"?>



<?php
//admin: View all Payments in Database
//student: View all Payments made by Student

$resourceName = strtok(basename(__FILE__), "_");

$url = $base_url;
if ($_SESSION['login_role'] == "admin") {
    $url .= $resourceName . "s";
} else if ($_SESSION['login_role'] == "student") {
    if (isset($_GET['student_id'])) {
        $url .= "payments/search/findByStudentId?studentId=" . $_GET['student_id'];
    }else {
        echo "Session Invalid";
        session_destroy();
        header("location:../../login.php");
    }
} else {
    echo "Session Invalid";
    session_destroy();
    header("location:../../login.php");
}
?>

<?php include "../includes/griddata.php"; ?>

<?php include "../includes/footer.php"; ?>
