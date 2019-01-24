<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 3:55 PM
 */

  session_start();

  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  if (isset($_POST['submit'])){
    $_SESSION['addstock']['name'] = $_POST['name'];
    $_SESSION['addstock']['categoryID'] = $_POST['categoryID'];
    $_SESSION['addstock']['price'] = $_POST['price'];
    $_SESSION['addstock']['topline'] = $_POST['topline'];
    $_SESSION['addstock']['description'] = $_POST['description'];
  }else{
    header("Location:index.php");
  }

  if ($_FILES['fileToUpload']['name']!=""){
    $_SESSION['addstock']['thumbnail'] = $_FILES['fileToUpload']['name'];
    $_SESSION['addstock']['bigphoto'] = $_SESSION['addstock']['thumbnail'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists. ";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
        <h1 class="text-danger">Confirm Stock Item Details</h1><br/>
        <h3><span class="text-danger">Name:</span> <?php echo $_SESSION['addstock']['name']?></h3><br/>
        <h3><span class="text-danger">Thumbnail:</span> <img src="images/<?php echo $_SESSION['addstock']['thumbnail']?>" width="100" height="150"></h3><br/>
        <h3><span class="text-danger">Category:</span>
          <?php
            $catname_sql = "SELECT name FROM category WHERE categoryID=".$_SESSION['addstock']['categoryID'];
            $catname_query = mysqli_query($dbc, $catname_sql);
            $catname_rs = mysqli_fetch_assoc($catname_query);
            echo $catname_rs['name'];
          ?>
        </h3><br/>
        <h3><span class="text-danger">Price:</span> $<?php echo $_SESSION['addstock']['price']?></h3><br/>
        <h3><span class="text-danger">Topline:</span> <?php echo $_SESSION['addstock']['topline']?></h3><br/>
        <h3><span class="text-danger">Description:</span> <?php echo $_SESSION['addstock']['description']?></h3><br/>
      <?php } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  }else{// the code below only run if no image is selected
      $_SESSION['addstock']['thumbnail'] = "noimage.jpg";
    ?>
    <h1 class="text-danger">Confirm Stock Item Details</h1><br/>
    <h3><span class="text-danger">Name:</span> <?php echo $_SESSION['addstock']['name']?></h3><br/>
    <h3><span class="text-danger">Thumbnail:</span> <img src="images/<?php echo $_SESSION['addstock']['thumbnail']?>" width="100" height="150"></h3><br/>
    <h3><span class="text-danger">Category:</span>
      <?php
      $catname_sql = "SELECT name FROM category WHERE categoryID=".$_SESSION['addstock']['categoryID'];
      $catname_query = mysqli_query($dbc, $catname_sql);
      $catname_rs = mysqli_fetch_assoc($catname_query);
      echo $catname_rs['name'];
      ?>
    </h3><br/>
    <h3><span class="text-danger">Price:</span> $<?php echo $_SESSION['addstock']['price']?></h3><br/>
    <h3><span class="text-danger">Topline:</span> <?php echo $_SESSION['addstock']['topline']?></h3><br/>
    <h3><span class="text-danger">Description:</span> <?php echo $_SESSION['addstock']['description']?></h3><br/>
  <?php }
?>
<p><a class="btn btn-danger" href="index.php?page=addstock">Oops, Go back</a> <a class="btn btn-success" href="index.php?page=enterstock">Correct, continue</a></p>
