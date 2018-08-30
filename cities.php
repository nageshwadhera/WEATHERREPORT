<?php
include 'connection.php';
$country = file_get_contents('city.list.json');
$de_country = json_decode($country);
print_r($de_country);

for ($i=0;$i<count($de_country);$i++)
{
    $iso = $de_country[$i]->country;
    $s = "select * from countries where isocode='$iso'";
    $result = mysqli_query($conn, $s);
    $row=mysqli_fetch_array($result);

    $country_id=$row[0];

    $city_id=$de_country[$i]->id;
    $city_name=urldecode($de_country[$i]->name);
    $lon=$de_country[$i]->coord->lon;
    $lat=$de_country[$i]->coord->lat;
    $sql="insert into city VALUES (NULL ,'$city_id','$city_name','$lon','$lat','$country_id')";
    mysqli_query($conn,$sql);
}