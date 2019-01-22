<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 10:07 AM
 */

  session_start();
  include ("dbconnect.php");
  unset($_SESSION['editstock']);

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

?>

<h1>Select stock item to edit</h1>
<?php
  $ct_sql = "SELECT * FROM category";
  $ct_qry = mysqli_query($dbc, $ct_sql);
  $ct_rs = mysqli_fetch_assoc($ct_qry);
  do{ ?>
    <h2><?php echo $ct_rs['name'] ?></h2>
    <?php
      $st_sql = "SELECT stockID, name, thumbnail FROM stock WHERE categoryID=".$ct_rs['categoryID'];
      $st_qry = mysqli_query($dbc, $st_sql);
      $st_rs = mysqli_fetch_assoc($st_qry);
      do{ ?>
        <p>
          <a href="index.php?page=editstock&stockID=<?php echo $st_rs['stockID'] ?>">
            <img src="images/<?php echo $st_rs['thumbnail']?>" alt="">
            <?php echo $st_rs['name']?>
          </a>
        </p>
      <?php }while($st_rs = mysqli_fetch_assoc($st_qry));
    ?>
  <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
  mysqli_free_result($st_qry);
  mysqli_free_result($ct_qry);
?>
<p><a href="index.php?page=cpanel">Back to admin panel</a></p>
