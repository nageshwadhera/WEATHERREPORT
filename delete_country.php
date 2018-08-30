<?php

include "connection.php";
$s="delete from countries where id='".$_REQUEST["id"]."'";
mysqli_query($conn,$s);
header("location:countries.php");
?>