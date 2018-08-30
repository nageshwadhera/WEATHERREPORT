<?php

include "connection.php";
$s="delete from admin where username='".$_REQUEST["id"]."'";
mysqli_query($conn,$s);
header("location:manageadmin.php");
?>