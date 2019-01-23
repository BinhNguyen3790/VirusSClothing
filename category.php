<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 11:41 AM
 */
  include("dbconnect.php");
  if(!isset($_GET['categoryID'])){
    // if categoryID is not set, redirect back to index page
    header("Location: index.php");
  }
  // select all stock items brlonging to the selected categoryID
  $stock_sql = "SELECT stock.stockID, stock.categoryID,stock.name, stock.price, stock.thumbnail, category.name AS catname 
    FROM stock JOIN category ON stock.categoryID=category.categoryID 
    WHERE stock.categoryID=".$_GET['categoryID'];
  if ($stock_query = mysqli_query($dbc, $stock_sql)){
    $stock_rs = mysqli_fetch_assoc($stock_query);
  }
  if (mysqli_num_rows($stock_query)==0){
    echo "Sorry, we have no items currently in stock";
  }else { ?>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=category&categoryID=<?php echo $stock_rs['categoryID']; ?>">
          <?php echo $stock_rs['catname']; ?>
        </a>
      </li>
    </ul><br/>
    <div class="container-fluid">
    <div class="row"> <?php do { ?>
      <div class="col-sm">
        <a href="index.php?page=item&stockID=<?php echo $stock_rs['stockID'] ?>">
          <div class="card">
            <img class="card-img-top" src="images/<?php echo $stock_rs['thumbnail'] ?>" alt="Card image cap"
              width="100" height="150">
            <div class="card-body">
              <p class="card-text"><?php echo $stock_rs['name'] ?></p>
              <p class="price text-danger">Price: $<?php echo $stock_rs['price'] ?>.00</p>
            </div>
          </div>
        </a>
      </div> <?php } while ($stock_rs = mysqli_fetch_assoc($stock_query)); }?>
    </div>
  </div>


