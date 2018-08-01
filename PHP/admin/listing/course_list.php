<?php  include "../includes/mainheader.php"?>


<?php
//admin: View all Courses in Database
//student: View all Courses enrolled in

$resourceName = strtok(basename(__FILE__), "_");

$url = $base_url;
if ($_SESSION['login_role'] == "admin") {
    $url .= $resourceName . "s";
} else if ($_SESSION['login_role'] == "student") {
    if (isset($_GET['student_id'])) {
        $url .= "students/" . $_GET['student_id'] . "/" . $resourceName . "_ids";
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
