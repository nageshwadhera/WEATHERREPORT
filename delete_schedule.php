<?php
include "connection.php";
$s="delete from schedule where id='".$_REQUEST["id"]."'";
mysqli_query($conn,$s);
header("location:insert_schedule.php?id=2");
?>