<?php
include 'connection.php';
$country = file_get_contents('city.list.json');
$de_country = json_decode($country);

$s="select * from countries where id>=172";
$result=mysqli_query($conn,$s);
while($row=mysqli_fetch_array($result))
{
    for ($i=0;$i<count($de_country);$i++)
    {
         if($de_country[$i]->country==$row[1])
         {
             $city_id=$de_country[$i]->id;
             $update="update city set countryid=$row[0] WHERE city_id='".$city_id."'";
             echo $update."<br>";
             mysqli_query($conn,$update);
         }

    }
}
//172
