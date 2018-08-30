<?php
ob_start();
include 'user_header.php';
$country=$_REQUEST['country'];
$cities=$_REQUEST['cities'];

foreach ($cities as $city) {
    $s="insert into user_cities VALUES (NULL ,'$country','$city','$email')";
    mysqli_query($conn,$s);
}
header("Location:weather_show.php");