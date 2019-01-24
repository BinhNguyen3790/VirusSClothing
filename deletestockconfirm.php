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

<h1 class="text-danger">Confirm Stock Item To Delete</h1><br/>
<p><img src="images/<?php echo $st_rs['thumbnail']?>" alt=""></p><br/>
<h3><span class="text-danger">Item to be delete is:</span> <?php echo $st_rs['name']?></h3><br/>
<h3><span class="text-danger">Category:</span> <?php echo $st_rs['catname']?></h3><br/>
<h3><span class="text-danger">Price:</span> $<?php echo $st_rs['price']?></h3><br/>
<h3><span class="text-danger">Topline:</span> <?php echo $st_rs['topline']?></h3><br/>
<h3><span class="text-danger">Description:</span> <?php echo $st_rs['description']?></h3><br/>
<p><a class="btn btn-danger" href="index.php?page=deletestockselect">Oops, Go back</a> <a class="btn btn-success" href="index.php?page=deletestock&stockID=<?php echo $_GET['stockID']?>">Delete</a></p>
