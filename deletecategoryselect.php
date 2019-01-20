<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 20/01/2019
 * Time: 9:36 AM
 */

  include ("dbconnect.php");
  session_start();

  // check to see if user is logged in. if not, redirect to admin page
  if (!isset($_SESSION['admin'])){
    header("Location:index.php?page=admin");
  }

?>

<h1>Delete category</h1>
<?php
  $delcat_sql = "SELECT * FROM category";
  $delcat_query = mysqli_query($dbc, $delcat_sql);
  $delcat_rs = mysqli_fetch_assoc($delcat_query);
  do{?>
    <p><a href="index.php?page=deletecategoryconfirm&categoryID=<?php echo $delcat_rs['categoryID']?>"><?php echo $delcat_rs['name']; ?></a></p>
  <?php }while($delcat_rs = mysqli_fetch_assoc($delcat_query));
?>