<?php

include "connection.php";
$s="update admindemo set type ='".$_REQUEST["type"]."' where email='".$_REQUEST["email"]."'";

echo $s;
mysqli_query($conn,$s);
header("location: manageadmin.php");