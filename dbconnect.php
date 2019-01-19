<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 19/01/2019
 * Time: 10:18 AM
 */

$dbc = mysqli_connect("localhost", "root","", "virussclothing")
    or die("connect database failed: " .mysqli_connect_error());