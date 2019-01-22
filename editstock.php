<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 22/01/2019
 * Time: 10:25 AM
 */

  session_start();
  include ("dbconnect.php");

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  if (isset($_GET['stockID'])){
    $_SESSION['editstock']['stockID'] = $_GET['stockID'];
  }

  if (!isset($_SESSION['editstock']['name'])) {
    $st_sql = "SELECT * FROM stock WHERE stockID=" . $_GET['stockID'];
    $st_qry = mysqli_query($dbc, $st_sql);
    $st_rs = mysqli_fetch_assoc($st_qry);

    $_SESSION['editstock']['categoryID'] = $st_rs['categoryID'];
    $_SESSION['editstock']['name'] = $st_rs['name'];
    $_SESSION['editstock']['price'] = $st_rs['price'];
    $_SESSION['editstock']['thumbnail'] = $st_rs['thumbnail'];
    $_SESSION['editstock']['topline'] = $st_rs['topline'];
    $_SESSION['editstock']['description'] = $st_rs['description'];
  }

?>

<h1>Edit stock</h1>
<form action="index.php?page=editstockconfirm" enctype="multipart/form-data" method="post">
  <p>Stock item name: <input type="text" name="name" value="<?php echo $_SESSION['editstock']['name']?>"></p>
  <p>Thumbnail image: <input type="file" name="fileToUpload" id="fileToUpload"></p>
  <p>Category:
    <select name="categoryID">
      <?php
        $ct_sql = "SELECT * FROM category";
        $ct_qry = mysqli_query($dbc, $ct_sql);
        $ct_rs = mysqli_fetch_assoc($ct_qry);
        do{ ?>
          <option value="<?php echo $ct_rs['categoryID']?>"
            <?php
              if ($ct_rs['categoryID']==$_SESSION['editstock']['categoryID']){
                echo "selected=selected";
              }
            ?>
          ><?php echo $ct_rs['name']?></option>
        <?php }while($ct_rs = mysqli_fetch_assoc($ct_qry));
      ?>
    </select>
  </p>
  <p>Price: $<input type="number" name="price" value="<?php echo $_SESSION['editstock']['price']?>"></p>
  <p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['editstock']['topline']?>"></p>
  <p>Description: <textarea name="description" cols="30" rows="10"><?php echo $_SESSION['editstock']['description']?></textarea></p>
  <input type="submit" name="upload" value="Update">
</form>
