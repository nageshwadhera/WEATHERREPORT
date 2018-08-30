<?php
include 'connection.php';
//echo date('l');
$s = "select * from schedule";
$result = mysqli_query($conn, $s);
while ($row = mysqli_fetch_array($result)) {
    //echo $row['day'] . "<br>";
    $msg='';
    if(date('l')===$row['day']) {

        $cityname = "select * from city WHERE city_id=" . $row['city_name'] . " GROUP BY city_id";
        //echo $cityname;
        $cityname_result = mysqli_query($conn, $cityname);
        $cityname_row = mysqli_fetch_array($cityname_result);

        //echo "<br>".$cityname_row['city_id']."<br>";

        $user="select * from signup where email='".$row['email']."'";
        $user_result=mysqli_query($conn,$user);
        $user_row=mysqli_fetch_array($user_result);

        $url = "api.openweathermap.org/data/2.5/weather?id=" . $cityname_row['city_id'] . "&appid=ba5b8c784b77da73e2f0775e258fdd05";
        //echo $url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $curl_scraped_page = curl_exec($ch);
        //print_r($curl_scraped_page);
        curl_close($ch);
        $jsonresult = $curl_scraped_page;
        //print_r($jsonresult);
        $json_data = json_decode($jsonresult);
        //print_r($json_data);

        $temp=$json_data->main->temp-273.15;
        $msg.="Today's Weather Condition for ".$cityname_row['city_name']." on ".date('dS M, Y')." .".$row['day']." is as follow:-";
        $msg.="It is Expected to be".$json_data->weather[0]->main.". Temp : ".$temp." º C ";

        echo $user_row['mobile'].' '.$msg;
        //echo "<br>".$user_row['mobile']."<br>";

        //echo '<br>==========='.$row['day']." ".date('l')."===============<br>";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            "username=weather&password=X0LQVGBK&message=" . $msg . "&phone_numbers=" . $user_row['mobile']);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //print_r($ch);
        $server_output = curl_exec($ch);

        curl_close($ch);
    }
}