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
<div class="maincontent">
  <h1 class="text-danger">Edit Stock Item</h1><br/>
  <form class="login-form" action="index.php?page=editstockconfirm" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Stock Item Name</label>
      <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['editstock']['name']?>" size="40" maxlength="50" required/>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Topline</label>
      <input class="form-control" id="example-number-input" type="text" name="topline" value="<?php echo $_SESSION['editstock']['topline']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Category</label>
      <select class="form-control" id="exampleSelect1" name="categoryID">
        <?php
        $catlist_sql = "SELECT * FROM category";
        $catlist_query = mysqli_query($dbc, $catlist_sql);
        $catlist_rs = mysqli_fetch_assoc($catlist_query);
        do{?>
          <option value="<?php echo $catlist_rs['categoryID']?>"
            <?php
            if ($catlist_rs['categoryID']==$_SESSION['editstock']['categoryID']){
              echo "selected=selected";
            }
            ?>
          >
            <?php echo $catlist_rs['name']?>
          </option>
        <?php }while($catlist_rs = mysqli_fetch_assoc($catlist_query));
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Price</label>
      <input class="form-control" id="example-number-input" placeholder="$" type="number" name="price" value="<?php echo $_SESSION['editstock']['price']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Thumbnail Image</label><br/>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Description</label>
      <textarea class="form-control" id="example-number-input"  name="description" cols="60" rows="5" required><?php echo $_SESSION['editstock']['description']?></textarea>
    </div>
    <div class="form-check">
      <input class="btn btn-login float-right btn-success" type="submit" name="upload" value="Update">
    </div>
  </form>
  <p class="float-right pr-1"><a class="btn btn-danger" href="index.php?page=editstockselect">Oops, go back</a></p>
</div>