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

<h1 class="text-danger">Update Stock Confirm</h1><br/>
<h3><span class="text-danger">Update stock item name:</span> <?php echo $_SESSION['editstock']['name']?></h3><br/>
<h3><span class="text-danger">Category:</span> <?php echo $_SESSION['editstock']['categoryID']?></h3><br/>
<h3><span class="text-danger">Price:</span> $<?php echo $_SESSION['editstock']['price']?></h3><br/>
<h3><span class="text-danger">Topline:</span> <?php echo $_SESSION['editstock']['topline']?></h3><br/>
<h3><span class="text-danger">Description:</span> <?php echo $_SESSION['editstock']['description']?></h3><br/>
<p><a class="btn btn-danger" href="index.php?page=editstock">Oops, go back</a> <a class="btn btn-success" href="index.php?page=editstockupdate">Correct, continue</a> </p>
