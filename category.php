<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 11:41 AM
 */

    include("dbconnect.php");

    if(!isset($_GET['categoryID'])){
        // if categoryID is not set, redirect back to index page
        header("Location: index.php");
    }
    // select all stock items brlonging to the selected categoryID
    $stock_sql = "SELECT stock.stockID, stock.name, stock.price, category.name AS catname 
      FROM stock JOIN category ON stock.categoryID=category.categoryID 
      WHERE stock.categoryID=".$_GET['categoryID'];

    if ($stock_query = mysqli_query($dbc, $stock_sql)){
        $stock_rs = mysqli_fetch_assoc($stock_query);
    }

    if (mysqli_num_rows($stock_query)==0){
        echo "Sorry, we have no items currently in stock";
    }else{?>
        <h1><?php echo $stock_rs['catname']; ?></h1>
        <?php
            do{?>
                <div class="item">
                    <a href="index.php?page=item&stockID=<?php echo $stock_rs['stockID']; ?>">
                        <p><?php echo $stock_rs['name'];?></p>
                        <p>$<?php echo $stock_rs['price'];?></p>
                    </a>
                </div>
            <?php }while($stock_rs = mysqli_fetch_assoc($stock_query));
        ?>
    <?php }

?>