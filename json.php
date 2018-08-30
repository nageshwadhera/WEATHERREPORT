<?php
$Parsing = $_REQUEST["address"];
$address = str_replace(' ', '+', $Parsing);
$jsonf = file_get_contents('http://api.openweathermap.org/data/2.5/weather?APPID=4bba2461ead0cc3be92b45fa9385a62c&q=' . $address);
$jsond = json_decode($jsonf);
echo "<pre>";
print_r($jsond);
echo "</pre>";
?>

