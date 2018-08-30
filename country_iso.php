<?php
include 'connection.php';
$country = file_get_contents('city.list.json');
$de_country = json_decode($country);
//print_r($de_country);
echo count($de_country)."<br>";
echo $lat=$de_country[0]->coord->lat;
/*for ($i = 0; $i < count($de_country); $i++) {
    $iso = $de_country[$i]->country;
    $s = "select * from countries where isocode='$iso'";
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) <= 0) {
        $coun = "insert into countries VALUES (NULL ,'$iso','')";
        mysqli_query($conn, $coun);
    }
}*/
