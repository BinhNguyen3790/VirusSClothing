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
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>VirusS Clothing</title>
</head>
<body>
    <div class="container">
    <!--    Begin Header-->
        <?php
            include ("header.php");
        ?>
    <!--    End Header-->
        <?php
            //check to see if user is visiting a page other than the home page
            if (!isset($_GET['page'])){ ?>
                <div class="banner"></div>
            <?php }
        ?>
    <!--    Begin Main-->
        <main>
            <div class="maincontent col-md-8 col-sm-8">
                <?php
                    if(!isset($_GET['page'])){
                        include ("home.php");
                    }else{
                        $page = $_GET['page'];
                        include ("$page.php");
                    }
                ?>
            </div>
            <?php include("seccontent.php")?>
        </main>
    <!--    End Main-->
    <!--    Begin Footer-->
        <footer>
            <div class="footer"></div>
        </footer>
    <!--    End Footer-->
    </div>
</body>
</html>
