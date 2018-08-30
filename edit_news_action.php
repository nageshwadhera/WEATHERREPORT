<?php
$newsid = $_REQUEST["newsid"];
$newstitle = $_REQUEST["newstitle"];
$news = $_REQUEST["news"];
$dateofnews = $_REQUEST["dateofnews"];
include "connection.php";

$update = "update news set newstitle='$newstitle',news='$news',dateofnews='$dateofnews' WHERE newsid='" . $_REQUEST['newsid'] . "'";
echo $update;
mysqli_query($conn, $update);
//echo $update;
header("location:managenews.php");