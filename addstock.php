<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 3:39 PM
 */

  session_start();

  if(!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  if (!isset($_SESSION['addstock'])){
    $_SESSION['addstock']['name'] = "";
    $_SESSION['addstock']['categoryID'] = "1";
    $_SESSION['addstock']['price'] = "";
    $_SESSION['addstock']['topline'] = "";
    $_SESSION['addstock']['description'] = "";
    $_SESSION['addstock']['thumbnail'] = "noimage.jpg";
    $_SESSION['addstock']['bigphoto'] = "noimage.jpg";

  }else{
    if ($_SESSION['addstock']['thumbnail']!="noimage.jpg"){
      unlink("images/".$_SESSION['addstock']['thumbnail']);
    }
  }

?>

<div class="maincontent">
  <h1 class="text-danger">Enter Details For New Stock Item</h1><br/>
  <form class="login-form" action="index.php?page=confirmaddstock" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Stock Item Name</label>
      <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['addstock']['name']?>" size="40" maxlength="50" required/>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Topline</label>
      <input class="form-control" id="example-number-input" type="text" name="topline" value="<?php echo $_SESSION['addstock']['topline']?>" required>
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
            if ($catlist_rs['categoryID']==$_SESSION['addstock']['categoryID']){
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
      <input class="form-control" id="example-number-input" placeholder="$" type="number" name="price" value="<?php echo $_SESSION['addstock']['price']?>" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Thumbnail Image</label><br/>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="text-danger">Description</label>
      <textarea class="form-control" id="example-number-input"  name="description" cols="60" rows="5" required><?php echo $_SESSION['addstock']['description']?></textarea>
    </div>
    <div class="form-check">
      <input class="btn btn-login float-right btn-success" type="submit" name="submit" value="Submit">
    </div>
  </form>
  <p class="float-right pr-1"><a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a></p>
</div>