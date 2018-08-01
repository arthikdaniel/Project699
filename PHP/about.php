<?php
include "admin/includes/header.php";
include "admin/includes/session.php";
require("admin/includes/callRest.php");

?>


<div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <!-- Sidebar  -->
            <?php include "admin/includes/sidebar.php"; ?>
        </div>
        <div class="wrapper" style="height: 100%; width:10px"></div><!-- Page Content  -->
             <div class="jumbotron">
                 <h1 class="display-4">About Us!</h1>
                 <p class="lead">This is a simple demo site built to test various technologies & functionalities as part of Project 699 at the University of Windsor.</p>
        
                 <hr class="my-4">
                 <p>Built by Arthik, Pavan and Soundarya.</p>
                 <p class="lead">
                     <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                 </p>
             </div>
        
    </div>
    <?php include "admin/includes/footer.php"; ?>

    

