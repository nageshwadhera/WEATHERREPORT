<?php
include "user_header.php";
include 'connection.php';
$country=$_REQUEST['country'];
$cities=$_REQUEST['cities'];

$s="select * from  user_cities WHERE user_username='$email'";
$result=mysqli_query($conn,$s);
while ($row=mysqli_fetch_array($result))
{
    $delete="delete from user_cities WHERE id=".$row[0];
    mysqli_query($conn,$delete);
}

foreach ($cities as $city) {
    $sql="insert into user_cities VALUES (NULL ,'$country','$city','$email')";
    mysqli_query($conn,$sql);
}
header("Location:change_city.php");
