<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 8:32 AM
 */

  session_start();

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  include ("dbconnect.php");

?>

<h1 class="text-danger">Delete Stock Item</h1><br/>
<?php
  $ct_sql = "SELECT * FROM category";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
  do{ ?>
    <h3 class="nav justify-content-center text-light p-2 bg-danger"><?php echo $ct_rs['name'];?></h3><br/>
    <div class="container-fluid">
    <div class="row">
    <?php
      $st_sql = "SELECT stockID, name, thumbnail, price FROM stock WHERE categoryID=".$ct_rs['categoryID'];
      $st_qry = mysqli_query($dbc, $st_sql);
      $st_rs = mysqli_fetch_assoc($st_qry);
      do{ ?>
        <div class="col-sm">
          <a href="index.php?page=deletestockconfirm&stockID=<?php echo $st_rs['stockID'];?>">
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
  <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
  mysqli_free_result($st_qry);
  mysqli_free_result($ct_qry);
?>
<p class="float-right"><a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a></p><br/>
