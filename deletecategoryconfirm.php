<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 20/01/2019
 * Time: 9:36 AM
 */

session_start();
  include ("dbconnect.php");

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }

?>
<h1 class="text-danger">Confirm Category To Delete</h1><br/>
<?php
  $delcat_sql = "SELECT * FROM category WHERE categoryID=".$_GET['categoryID'];
  $delcat_query = mysqli_query($dbc, $delcat_sql);
  $delcat_rs = mysqli_fetch_assoc($delcat_query);

  // check if there are any stock items in this category
  $check_sql = "SELECT * FROM stock WHERE categoryID=".$_GET['categoryID'];
  $check_query = mysqli_query($dbc, $check_sql);
  $count = mysqli_num_rows($check_query);

?>

<h3><?php
  if ($count>0){
    echo "<span class='text-danger'>Warning!</span> there are: <span class='text-danger'>".$count." stock item(s)</span> in this category. 
    If you delete the category they will also be removed from the database";
  }
?></h3><br/>
<h3><?php echo "<span class=\"text-danger\">Do you really wish to delete </span>".$delcat_rs['name']."?"; ?></h3><br/>
<p>
  <a class="btn btn-danger" href="index.php?page=deletecategoryselect">No, go back</a>
  <a class="btn btn-success" href="index.php?page=deletecategory&categoryID=<?php echo $_GET['categoryID'];?>">Yes, delete it!</a>
</p>


