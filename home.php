<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 11:40 AM
 */
  include ("dbconnect.php");
  $ct_sql = "SELECT * FROM category";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
  $st_sql = "SELECT * FROM stock";
  $st_qry = mysqli_query($dbc, $st_sql);
  $st_rs = mysqli_fetch_assoc($st_qry);
?>
<ul class="nav justify-content-center">
  <?php
    do{ ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=category&categoryID=<?php echo $ct_rs['categoryID'];?>">
          <?php echo $ct_rs['name'] ?>
        </a>
      </li>
    <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
  ?>
</ul><br/>
<div class="container-fluid">
  <div class="row">
    <?php
    do {?>
      <div class="col-sm">
        <a href="index.php?page=item&stockID=<?php echo $st_rs['stockID'] ?>">
          <div class="card">
            <img class="card-img-top" src="images/<?php echo $st_rs['thumbnail']?>" alt="Card image cap" width="100" height="150">
            <div class="card-body">
              <p class="card-text"><?php echo $st_rs['name']?></p>
              <p class="price text-danger">Price: $<?php echo $st_rs['price']?>.00</p>
            </div>
          </div>
        </a>
      </div>
    <?php }while($st_rs = mysqli_fetch_assoc($st_qry));
    ?>
  </div>
</div>

