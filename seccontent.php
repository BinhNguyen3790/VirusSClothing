<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 10:06 AM
 */
  include ("dbconnect.php");
  $ct_sql = "SELECT * FROM category";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
?>
<ul class="list-group">
  <li class="list-group-item align-items-center">CATEGORY</li>
  <?php
  do {?>
    <a href="index.php?page=category&categoryID=<?php echo $ct_rs['categoryID'];?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
      <?php echo $ct_rs['name'] ?>
    <span class="badge badge-pill">
      <?php
        $st_sql = "SELECT COUNT('categoryID') AS categoryID FROM stock WHERE stock.categoryID=".$ct_rs['categoryID'];
        $st_qry = mysqli_query($dbc, $st_sql);
        $st_rs = mysqli_fetch_assoc($st_qry);
        do{ ?>
          <?php echo $st_rs['categoryID']; ?>
        <?php }while($st_rs = mysqli_fetch_assoc($st_qry));
      ?>
    </span>
  <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry))
  ?>
  </a>
</ul>





