<?php

include "connection.php";

$query = "select * from admin";

$flag = 0;

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    if ($row[0] == $_REQUEST["email"]) {
        $flag = 1;
        break;
    }
}

if ($flag == 1) {
    echo "Email Id already exist";
} else {
    $q = "insert into admin values('" . $_REQUEST["email"] . "','" . $_REQUEST["password"] . "',
    '" . $_REQUEST["fullname"] . "','" . $_REQUEST["gender"] . "'," . $_REQUEST["mobile"] . ",
    '" . $_REQUEST["type"] . "')";
    mysqli_query($conn, $q);
    echo "New user added sucessfully";
}




