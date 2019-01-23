<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 2019/1/18
 * Time: 8:31
 */
  include ("dbconnect.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="images/logo2.png" type="image/x-icon">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/js.js"></script>
  <title>VirusS Clothing</title>
</head>
<body>
  <div class="container">
  <!--    Begin Header-->
    <header>
      <?php
        include ("header.php");
      ?>
    </header>
  <!--    End Header-->
    <?php
      if (!isset($_GET['page'])){
        include ("slider.php");
      }
    ?>
  <!--    Begin Main-->
    <main>
      <div class="maincontent col-md-8 col-sm-8" id="myList">
        <?php
          if(!isset($_GET['page'])){
            include ("home.php");
          }else{
            $page = $_GET['page'];
            include ("$page.php");
          }
        ?>
      </div>
      <div class="seccontent col-md-4 col-sm-4">
        <?php include("seccontent.php")?>
      </div>
    </main>
  <!--    End Main-->
  <!--    Begin Footer-->
    <footer class="text-center bg-light align-bottom p-3" id="footer">
      &copy; Copyright <?php echo date("Y"); ?> VirusS Clothing All Rights Reserved
    </footer>
  <!--    End Footer-->
  </div>
</body>
</html>
