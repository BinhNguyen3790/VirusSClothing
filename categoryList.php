<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 10:52 AM
 */

    include("dbconnect.php");

    $cat_sql = "SELECT * FROM category";
    $cat_query = mysqli_query($dbc, $cat_sql);
    $cat_rs = mysqli_fetch_assoc($cat_query);
    do {?>
        <a href="index.php?page=category&categoryID=<?php echo $cat_rs['categoryID'];?>">
            <?php echo $cat_rs['name'];?>
        </a> |
        <?php
    } while($cat_rs = mysqli_fetch_assoc($cat_query));

?>