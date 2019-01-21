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
  <h1>Enter details for new stock item</h1>
  <form action="index.php?page=confirmaddstock" method="post" enctype="multipart/form-data">
    <p>Stock item name: <input type="text" name="name" value="<?php echo $_SESSION['addstock']['name']?>"></p>
    <p>Thumbnail image: <input type="file" name="fileToUpload" id="fileToUpload"></p>
    <p>Category:
      <select name="categoryID">
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
    </p>
    <p>Price: $<input type="number" name="price" value="<?php echo $_SESSION['addstock']['price']?>"></p>
    <p>Topline: <input type="text" name="topline" value="<?php echo $_SESSION['addstock']['topline']?>"></p>
    <p>Description: <textarea name="description" cols="60" rows="5" ><?php echo $_SESSION['addstock']['description']?></textarea></p>
    <input type="submit" value="Submit" name="submit">
  </form>
  <p><a href="index.php?page=admin">Back to admin</a></p>
</div>
