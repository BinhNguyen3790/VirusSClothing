<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 11:40 AM
 */

  include ("dbconnect.php");

//  $ct_sql = "SELECT * FROM category";
//  $ct_qry = mysqli_query($dbc, $ct_sql);
//  $ct_rs = mysqli_fetch_assoc($ct_qry);

?>


<h1>Welcome to VirusS Clothing</h1><br/>
<?php
  do{ ?>
<!--  <h2>-->
<!--    <a href="index.php?page=category&categoryID=--><?php //echo $ct_rs['categoryID']?><!--">--><?php //echo $ct_rs['name'] ?><!--</a>-->
<!--  </h2>-->
  <div class="container-fluid">
    <div class="row">
      <?php
      $st_sql = "SELECT * FROM stock";
      $st_qry = mysqli_query($dbc, $st_sql);
      $st_rs = mysqli_fetch_assoc($st_qry);
      do{ ?>
        <div class="col-sm">
          <a href="index.php?page=item&stockID=<?php echo $st_rs['stockID'] ?>">
            <div class="card">
              <img class="card-img-top" src="images/<?php echo $st_rs['thumbnail']?>" alt="Card image cap" width="100" height="150">
              <div class="card-body">
                <p class="card-text"><?php echo $st_rs['name']?></p>
              </div>
            </div>
          </a>
        </div>
      <?php }while($st_rs = mysqli_fetch_assoc($st_qry));
      ?>
    </div>
  </div>
  <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
?>

