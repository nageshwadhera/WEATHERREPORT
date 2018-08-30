<?php

include "connection.php";

$query = "select * from news";

$flag = 0;

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    if ($row[1] == $_REQUEST["newstitle"]) {
        $flag = 1;
        break;
    }
}

if ($flag == 1) {
    echo "News already exists";
} else {
    $q = "insert into news values('"  . "','" . $_REQUEST["newstitle"] . "','" . $_REQUEST["news"] . "','" . $_REQUEST["dateofnews"] .  "')";
    mysqli_query($conn, $q);
    echo "News Added Successfully";
}




