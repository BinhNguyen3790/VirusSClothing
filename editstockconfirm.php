<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 11:05 AM
 */

  session_start();
  include ("dbconnect.php");

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  $_SESSION["editstock"]['name'] = $_POST['name'];
  $_SESSION["editstock"]['categoryID'] = $_POST['categoryID'];
  $_SESSION["editstock"]['price'] = $_POST['price'];
  $_SESSION["editstock"]['topline'] = $_POST['topline'];
  $_SESSION["editstock"]['description'] = $_POST['description'];

?>

<h1>Update stock confirm</h1>
<p>Update stock item name: <?php echo $_SESSION['editstock']['name']?></p>
<p>Category: <?php echo $_SESSION['editstock']['categoryID']?></p>
<p>Price: $<?php echo $_SESSION['editstock']['price']?></p>
<p>Topline: <?php echo $_SESSION['editstock']['topline']?></p>
<p>Description: <?php echo $_SESSION['editstock']['description']?></p>
<p>
  <a href="index.php?page=editstockupdate">Confirm</a> |
  <a href="index.php?page=editstock">Oops, go back</a> |
  <a href="index.php?page=cpanel">Back to admin panel</a>
</p>
