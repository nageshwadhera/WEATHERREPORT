<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="row">
        <?php
        $sel_user = "select * from signup";
        $res_email = mysqli_query($conn, $sel_user);
        while ($row_email = mysqli_fetch_array($res_email)) {
            $s = "select * from city INNER JOIN user_cities on user_cities.cityid=city.id WHERE user_username='$row_email[0]'";
            //echo $s;
            $result = mysqli_query($conn, $s);

            while ($row = mysqli_fetch_array($result)) {
                $cityid = $row['city_id'];
                //echo $cityid."<br>";
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
                    if ($json_data1->list[$i]->weather[0]->main == 'fog' || $json_data1->list[$i]->weather[0]->main == 'Dense fog') {
                        ?>
                        <div class="col-sm-4">
                            <div class="broadcast">
                                <h3><?php echo $json_data1->city->name ?>
                                    <small>( <?php echo $row_email[2] ?> <?php echo $row_email[4] ?>, )</small>
                                </h3>
                                <p><?php echo $json_data1->list[$i]->weather[0]->main; ?> on <?php echo $day ?>
                                    , <?php echo $date; ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>
        <div class="form-group">
            <a href="send_broadcastsms.php"><input type="button" value="Send SMS" class="btn btn-success"></a>


        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>