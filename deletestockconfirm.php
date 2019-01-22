<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 9:03 AM
 */

  session_start();
  include ("dbconnect.php");

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  if (isset($_GET['stockID'])){
    $_SESSION['deletestock'] = $_GET['stockID'];
  }else{
    header("Location:cpanel.php");
  }

  $st_sql = "SELECT stock.thumbnail, stock.name, stock.price, stock.topline, stock.description, category.name AS catname 
    FROM stock JOIN category ON (stock.categoryID=category.categoryID) WHERE stock.stockID=".$_GET['stockID'];
  $st_qry = mysqli_query($dbc, $st_sql);
  $st_rs = mysqli_fetch_assoc($st_qry);

?>

<h1>Confirm stock item to delete</h1>
<p><img src="images/<?php echo $st_rs['thumbnail']?>" alt=""></p>
<p>Item to be delete is: <?php echo $st_rs['name']?></p>
<p>Category: <?php echo $st_rs['catname']?></p>
<p>Price: $<?php echo $st_rs['price']?></p>
<p>Topline: <?php echo $st_rs['topline']?></p>
<p>Description: <?php echo $st_rs['description']?></p>
<p><a href="index.php?page=deletestockselect">Oops, Go back</a> | <a href="index.php?page=deletestock&stockID=<?php echo $_GET['stockID']?>">Delete</a> | <a href="index.php?page=cpanel">Back to admin panel</a></p>
