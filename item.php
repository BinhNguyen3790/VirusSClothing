<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 5:36 PM
 */
  include("dbconnect.php");
  // redorect back to index page if no stockID has been set
  if (!isset($_GET['stockID'])){
    header("Location: index.php");
  }
  $item_sql = "SELECT * FROM stock WHERE stockID=".$_GET['stockID'];
  if ($item_query = mysqli_query($dbc, $item_sql)){
    $item_rs = mysqli_fetch_assoc($item_query);?>
    <div class="item row">
      <div class="col-md-7">
        <p><img src="images/<?php echo $item_rs['bigphoto']?>" alt=""></p>
      </div>
      <div class="col-md-5 pt-5">
        <h1><?php echo $item_rs['name']; ?></h1>
        <p class="price text-danger">Price: $<?php echo $item_rs['price']?>.00</p>
        <p><?php echo $item_rs['description']?></p>
        <a href="index.php?page=buy&stockID=<?php echo $item_rs['stockID']?>" class="btn btn-success btn-block">$ Buy Now</a>
        <a href="index.php?page=cart&stockID=<?php echo $item_rs['stockID']?>" class="btn btn-danger btn-block">Add to Cart</a>
        <a href="index.php?page=contact&stockID=<?php echo $item_rs['stockID']?>" class="btn btn-dark btn-block">Contact Us</a>
      </div>
    </div>
  <?php }
?>
