<?php  include "../includes/mainheader.php"?>


<?php
//admin: View all Attendances in Database
//student: View all Attendances enrolled by Student ID and (or) Course ID in

$resourceName = strtok(basename(__FILE__), "_");

$url = $base_url;
if ($_SESSION['login_role'] == "admin") {
    $url .= $resourceName . "s";
} else if ($_SESSION['login_role'] == "student") {
    if (isset($_GET['student_id'])) {
        if (isset($_GET['course_id'])) {
            $url .= $resourceName . "s/search/findByStudentIdAndCourseId?studentId=" . $_GET['student_id'] . '&courseId=' . $_GET['course_id'];
        } else {
            //Only Student ID is available
            $url .= $resourceName . "s/search/findByStudentId?studentId=" . $_GET['student_id'];
        }
    } else {
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
