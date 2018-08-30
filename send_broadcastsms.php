<?php
ob_start();
include 'adminheader.php';
//$flag=0;
$sel_user = "SELECT * FROM `user_cities` group by countryid";
$res_email = mysqli_query($conn, $sel_user);
while ($row_email = mysqli_fetch_array($res_email)) {
    $msg = '';

    $msg .= 'There are severe Weather Condition in the following cities:-';
    $s = "SELECT * FROM `user_cities` inner join signup on signup.email=user_cities.`user_username` right join city on city.id=user_cities.`cityid` where user_cities.`countryid`=" . $row_email[1] . " group by cityid";
    //echo $s;
    $result = mysqli_query($conn, $s);
    while ($row = mysqli_fetch_array($result)) {
        $cityid = $row['city_id'];
        //echo $cityid;
        date_default_timezone_set('Asia/Kolkata');
        $url1 = "http://api.openweathermap.org/data/2.5/forecast?id=" . $cityid . "&appid=ba5b8c784b77da73e2f0775e258fdd05";
//echo $url1;
        $ch1 = curl_init($url1);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page1 = curl_exec($ch1);
        curl_close($ch1);
        $result1 = $curl_scraped_page1;
        $json_data1 = json_decode($result1);

        for ($i = 0; $i < count($json_data1->list); $i += 8) {
            $timestamp = $json_data1->list[$i]->dt;
            $day = gmdate("D", $timestamp);
            $date = gmdate("d M", $timestamp);

            //echo $date."<br> ";
            //print_r($json_data1);
            if ($json_data1->list[$i]->weather[0]->main == 'Clouds' || $json_data1->list[$i]->weather[0]->main == 'Dense fog') {

                $msg .= $json_data1->city->name . ' It has ' . $json_data1->list[$i]->weather[0]->main . ' on ' . $day . ' ' . $date;
                            }

        }
    }
    $sendsms = "SELECT * FROM `signup` inner join user_cities on user_cities.user_username=signup.email WHERE cityid=" . $row_email['cityid'];
    //echo "<br>".$sendsms."<br>";
    $phonenumbers = '';
    $sendsms_result = mysqli_query($conn, $sendsms);
    while ($sendsms_row = mysqli_fetch_array($sendsms_result)) {
        $phonenumbers .= $sendsms_row['mobile'] . ',';

    }
    //$phonenumbers = trim($phonenumbers, ',');
    $message = urlencode($msg);
    //echo $phonenumbers.'<br>';
    //echo $msg.'<br>';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "username=weather&password=X0LQVGBK&message=" . $message . "&phone_numbers=" . $phonenumbers);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //print_r($ch);
    $server_output = curl_exec($ch);

    curl_close($ch);

    //print_r($server_output);
}
header("Location:confirsms.php?q=".$server_output);
?>