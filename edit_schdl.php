<?php

include "connection.php";
$s="update schedule set city_name='".$_REQUEST["cityname"]."',day='".$_REQUEST["day"]."'where id=".$_REQUEST["id"];
mysqli_query($conn,$s);
header("location:insert_schedule.php?id=2");

?>