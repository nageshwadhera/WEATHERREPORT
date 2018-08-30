<?php
ob_start();
include 'adminheader.php';
$id=$_REQUEST['id'];

$cityid = $_REQUEST['cityid'];
$cityname = $_REQUEST['cityname'];
$country = $_REQUEST['country'];
$latitude = $_REQUEST['latitude'];
$longitude= $_REQUEST['longitude'];

$s="update city set city_id='$cityid',city_name='$cityname',longitude='$longitude',latitude='$latitude',countryid='$country' WHERE id=".$id;
mysqli_query($conn,$s);
header("Location:city.php");