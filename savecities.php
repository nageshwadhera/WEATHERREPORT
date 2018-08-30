<?php
session_start();
$cityid = $_REQUEST['q'];

$status = $_REQUEST['status'];
//echo $cityid.' '.$status;
$cities = array();
if (isset($_SESSION['cities'])) {
    //echo 'yes';
    $cities = $_SESSION['cities'];

    $flag = 0;
    //echo count($cities);
    if ($status == 'yes') {
        $cities[count($cities)] = $cityid;
    } else {
        for ($i = 0; $i < count($cities); $i++) {
            if ($cities[$i] == $cityid) {
                unset($cities[$i]);
            }
        }

    }
    $_SESSION['cities'] = $cities;
} else {
    echo 'no';
    $cities[0] = $cityid;
    $_SESSION['cities'] = $cities;
}
//print_r($_SESSION['cities']);