<?php
include 'user_header.php';
?>
<div class="container">
    <div class="row">
        <?php
        $city = "SELECT * FROM `city` inner join user_cities on user_cities.cityid=city.id WHERE user_username='$email'";
        $city_result = mysqli_query($conn, $city);
        date_default_timezone_set('Asia/Kolkata');
        while ($city_row = mysqli_fetch_array($city_result)) {
            $url = "api.openweathermap.org/data/2.5/weather?q=" . $city_row['city_name'] . "&APPID=ba5b8c784b77da73e2f0775e258fdd05";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            $result = $curl_scraped_page;
            $json_data = json_decode($result);
            //print_r($json_data);
            $icon = "http://openweathermap.org/img/w/" . $json_data->weather[0]->icon . ".png";

            $url1 = "http://api.openweathermap.org/data/2.5/forecast?id=".$city_row['city_id']."&appid=ba5b8c784b77da73e2f0775e258fdd05";
            //echo $url1;
            $ch1 = curl_init($url1);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page1 = curl_exec($ch1);
            curl_close($ch1);
            $result1 = $curl_scraped_page1;
            $json_data1 = json_decode($result1);

            ?>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="text-center"><?php echo $city_row['city_name'] ?></h1>
                    <hr>
                </div>
                <div class="col-sm-6">
                    <div class="weather1">
                        <div class="weather_head">
                            <div class="col-sm-9"><h2><?php echo $json_data->name; ?>
                                    , <?php echo $json_data->sys->country; ?></h2>
                                <p><?php echo $json_data->weather[0]->main; ?></p></div>

                            <div class="col-sm-3"><img src="<?php echo $icon ?>"><br>
                                <p class="text-center"><?php echo $json_data->weather[0]->description; ?></p></div>
                        </div>
                        <div class="weather1_detail">
                            <div class="col-sm-6"><h1><?php echo $json_data->main->temp-273.15; ?>º C</h1></div>
                            <div class="col-sm-6">
                                <h4>Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">Feels Like</div>
                                    <div class="col-sm-6"><b><?php echo $json_data->main->temp-273.15; ?>º C</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">Wind</div>
                                    <div class="col-sm-6"><b><?php echo $json_data->wind->speed; ?> m/s</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">Humidity</div>
                                    <div class="col-sm-6"><b><?php echo $json_data->main->humidity; ?>%</b></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">Pressure</div>
                                    <div class="col-sm-6"><b><?php echo $json_data->main->pressure; ?>hPa</b></div>
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
                                <hr>
                                <div class="col-sm-9"><b><?php echo date('d M, Y'); ?></b></div>
                                <div class="col-sm-3"><?php echo date('H:i:s'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">

                    <div class="col-sm-12">
                        <div class="weather3">
                            <h2><?php echo $city_row['city_name'] ?>, <?php echo $json_data->sys->country; ?></h2>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="weather2">
                            <div class="row">
                                <div class="col-sm-6"><img src="<?php echo $icon ?>"></div>
                                <div class="col-sm-6"><b><?php echo $json_data->main->temp-273.15; ?>º
                                        C</b><br><?php echo $json_data->weather[0]->main; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-center ">
                                        <b><?php echo $json_data->weather[0]->description; ?></b>
                                        <p>Wind: <?php echo $json_data->wind->speed; ?> m/s</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="weather4">
                                    <hr>
                                    <div class="col-sm-9"><b><?php echo date('d M, Y'); ?></b></div>
                                    <div class="col-sm-3"><?php echo date('H:i:s'); ?></div>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div><br><br>

            <?php
        }

        ?>
    </div>

</div>
<?php
include 'footer.php';
?>