<?php include "includes/mainheader.php" ?>

<?php
if($debug =="true") {
    var_dump($_SESSION);
}
?>

    <div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div><!-- Page Content  -->
        <div class="col">
            <?php if ($_SESSION['login_role'] == 'student') {
                include "widgets/attendance.php";
            } ?></div>
        <div class="col">
            <?php include "widgets/profile.php"; ?></div>
        <div class="col"><?php include "widgets/rank.php"; ?>
        </div>
        <div class="clearfix"></div>
    </div>
<?php include "includes/footer.php"; ?>