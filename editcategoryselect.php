<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 21/01/2019
 * Time: 9:45 AM
 */

  session_start();
  include ("dbconnect.php");

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php");
  }

  unset($_SESSION['editcategory']);

  $editcat_sql = "SELECT * FROM category";
  $editcat_query = mysqli_query($dbc, $editcat_sql);
  $editcat_rs = mysqli_fetch_assoc($editcat_query);

?>

<h1 class="text-danger">Edit Category</h1><br/>
<?php
  do{ ?>
    <ul class="nav justify-content-center">
      <li class="nav-item"
        <p><a class="nav-link" href="index.php?page=editcategory&categoryID=<?php echo $editcat_rs['categoryID']; ?>"><?php echo $editcat_rs['name']; ?></a></p>
      </li>
    </ul><br/>
  <?php }while($editcat_rs = mysqli_fetch_assoc($editcat_query))
?>
<p class="float-right"><a class="btn btn-danger" href="index.php?page=admin">Back to admin panel</a></p><br/>