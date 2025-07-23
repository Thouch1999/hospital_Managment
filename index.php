<?php 
  include_once "backend/database/config_database.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Medicio Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- call style  -->
  <?php
    include('./layout/styleShop.php');
  ?>

  <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <?php
      include('./layout/header.php'); 
    ?> 

  </header>

  <main class="main">

   <?php 
        if(isset($_GET['page'])){
          // include('./page/starter-page.php');
          include('page/'.$_GET['page'].'.php');
        }else{
          include('./layout/master.php');
          
        }

       
     
    ?>

  </main>

  <footer id="footer" class="footer light-background">
    <?php 
      include('./layout/footer.php');
    ?>

    

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  
  <!-- call js -->
  <?php 
    include('./layout/jsShop.php');
  ?>

</body>

</html>