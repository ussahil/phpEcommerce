<?php ob_start();



// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<!-- Header -->
<?php include('./header.php'); ?>
<!-- banner area -->
  <?php include('./_partials/_banner-area.php'); ?>  

    <!-- owl -->
    <!-- top products -->
    <?php include('./_partials/_top-sale.php');?>
    <!-- special price -->
    <?php include('./_partials/_special-price.php'); ?>
    <!-- end main -->

    <!-- footer -->
<?php
include("./footer.php");
?>