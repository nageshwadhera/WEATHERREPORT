<?php
session_start();
$username = $_SESSION["useremail"];
$oldpassword = $_REQUEST["oldpassword"];
$newpassword = $_REQUEST["newpassword"];
$confirmnewpassword = $_REQUEST["confirmpassword"];

include "connection.php";

$flag = 0;
$sql = "select * from signup";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {

    if ($username == $row[0] && $oldpassword == $row[1]) {
        $flag = 1;
        break;
    }
}

if ($flag != 1) {
    header("Location:userchangepassword.php?er=1");
} elseif ($newpassword != $confirmnewpassword) {
    header("Location:userchangepassword.php?er=2");
} else {
    $s = "update signup set password='" . $newpassword . "' where email='" . $username . "'";
    mysqli_query($conn, $s);
    header("Location:userchangepassword.php?er=3");
}
?>