<?php

include "connection.php";

$query = "select * from countries";

$flag = 0;

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    if ($row[1] == $_REQUEST["isocode"]) {
        $flag = 1;
        break;
    }
}

if ($flag == 1) {
    echo "isocode already exist";
} else {

    $isocode = strtoupper($_REQUEST["isocode"]);
    $country = ucwords($_REQUEST["country"]);
    $q = "insert into countries values(null,'$isocode','$country')";
    mysqli_query($conn, $q);
    echo "New user added sucessfully";
}
