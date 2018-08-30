<?php
ob_start();
include "user_header.php";
$city = $_REQUEST['city'];
$alldays = $_REQUEST['alldays'];
$dayar = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$flag = 0;
if ($alldays == '') {
    $days = $_REQUEST['days'];
    $s = "select * from schedule where city_name='$city' AND email='$email'";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $query = "delete from schedule where city_name='$city' AND email='$email'";
        mysqli_query($conn, $query);
    }
    foreach ($days as $day) {
        $sql = "insert into schedule VALUES (NULL ,'$city','$day','$email')";
        mysqli_query($conn, $sql);
    }
} else {
    $s = "select * from schedule where city_name='$city' AND email='$email'";
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $query = "delete from schedule where city_name='$city' AND email='$email'";
        mysqli_query($conn, $query);
    }

    foreach ($dayar as $day) {
        $sql = "insert into schedule VALUES (NULL ,'$city','$day','$email')";
        mysqli_query($conn, $sql);
    }
}

header("location:scheduling.php");
?>