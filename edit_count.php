<?php
include "connection.php";
$s = "update countries set isocode='" . $_REQUEST['iso'] . "',countryname='" . $_REQUEST['countrynam'] ."' where id='" . $_REQUEST['id'] . "'";

mysqli_query($conn,$s);
header("location:countries.php");
?>