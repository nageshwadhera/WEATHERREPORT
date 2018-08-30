<?php

include "connection.php";
$s="update admin set fullname='".$_REQUEST["fullname"]."', gender='".$_REQUEST["gender"]."', type='".$_REQUEST["type"]."', mobile='".$_REQUEST["mobile"]."' where username='".$_REQUEST["email"]."'";

mysqli_query($conn,$s);
header("location:manageadmin.php");
?>