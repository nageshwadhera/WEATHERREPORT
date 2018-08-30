<?php
include 'adminheader.php';
$id=$_REQUEST['id'];
$s="delete from city WHERE id=".$id;
mysqli_query($conn,$s);
header("Location:city.php");