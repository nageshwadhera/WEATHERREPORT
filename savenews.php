<?php

include "connection.php";
$newsid=$_REQUEST['newsid'];
$newstitle=$_REQUEST["newstitle"];
$news=$_REQUEST["news"];
$dateofnews=$_REQUEST["dateofnews"];


$s="update news set newstitle='".$newstitle."',news='".$news."',dateofnews='".$dateofnews."' where newsid=".$newsid;
echo  $s;
mysqli_query($conn,$s);
header("location:managenews.php");
