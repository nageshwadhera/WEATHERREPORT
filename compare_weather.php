<style>
    .alert {
        margin-bottom: 0px !important;
    }
</style>
<?php
include 'user_header.php';

?>
<div class="container">
    <h1 class="text-center">Compare Weather of the Cities</h1>
    <div class="row table-responsive" >
        <div style="min-height: 450px;" >
            <div class="temp_condition">
                <div class="single-temp alert alert-info">Weather Conditions</div>
                <div class="single-temp alert alert-info">Temp</div>
                <div class="single-temp alert alert-info">Weather</div>
                <div class="single-temp alert alert-info">Wind</div>
                <div class="single-temp alert alert-info">Humidity</div>
                <div class="single-temp alert alert-info">Pressure</div>
            </div>
            <div class="actual_temp">
                <?php
                $city = "SELECT * FROM `city` inner join user_cities on user_cities.cityid=city.id WHERE user_username='$email'";
                $city_result = mysqli_query($conn, $city);
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
                    ?>
                    <div class="temp_condition">
                        <div class="single-temp alert alert-info"><?php echo $city_row[2] ?></div>
                        <div class="single-temp alert alert-success"><?php echo $json_data->main->temp - 273.15; ?>º C
                        </div>
                        <div class="single-temp alert alert-success"><?php echo $json_data->weather[0]->main; ?> <img
                                    src="<?php echo $icon ?>"></div>
                        <div class="single-temp alert alert-success"><?php echo $json_data->wind->speed; ?> m/s</div>
                        <div class="single-temp alert alert-success"><?php echo $json_data->main->humidity; ?>%</div>
                        <div class="single-temp alert alert-success"><?php echo $json_data->main->pressure; ?>hPa</div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>
</div>

<div class="row">
    <div class="col-sm-12">&nbsp;</div>
</div>
<?php
include 'footer.php';
?>
