<?php
$cityid = $_REQUEST['cityid'];
$cityname = $_REQUEST['cityname'];
$country = $_REQUEST['country'];
$latitude = $_REQUEST['latitude'];
$longitude= $_REQUEST['longitude'];


include "connection.php";

$select = "select * from city";
$result = mysqli_query($conn, $select);
$flag = 0;
while ($row = mysqli_fetch_array($result)) {

    if ($row[1] == $cityid) {
        $flag = 1;
        break;
    }
}
if ($flag == 1) {

echo 'city already exist';
    //header("location:city.php?msg=city already exist");
} else {

        $insert_city = "insert into city VALUES (NULL ,'$cityid','$cityname','$longitude','$latitude','$country')";
        //echo $insert_city;
        mysqli_query($conn, $insert_city);
        echo 'City added Successfully';
        //header("location:city.php?msg=row inserted");
    }

