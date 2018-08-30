<?php
$s="delete from news where newsid=".$_REQUEST['newsid'];
include "connection.php";
mysqli_query($conn,$s);
header("location:managenews.php");
?>