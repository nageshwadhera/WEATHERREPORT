<?php
include "header_files.php";
include "connection.php";
$cityid = $_REQUEST['cityid'];
//$cityid = 1254868;
date_default_timezone_set('Asia/Kolkata');
$url1 = "http://api.openweathermap.org/data/2.5/forecast?id=" . $cityid . "&appid=ba5b8c784b77da73e2f0775e258fdd05";
//echo $url1;
$ch1 = curl_init($url1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page1 = curl_exec($ch1);
curl_close($ch1);
$result1 = $curl_scraped_page1;
$json_data1 = json_decode($result1);
?>
<div class="container">
<div class="row">
    <div class="col-sm-12">
        <div class="weather3">
            <div class="row">
                <div class="col-sm-10">
                    <h2><?php echo $json_data1->city->name; ?>
                        , <?php echo $json_data1->city->country; ?></h2>
                </div>
                <div class="col-sm-2"><b><?php echo date('d M, Y'); ?></b> <?php echo date('H:i:s'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="weather5">
            <div class="row">
                <div class="col-sm-3">
                    <div class="col-sm-6"><img src="images/50d.png"></div>
                    <div class="col-sm-6"><b><?php echo $json_data1->list[0]->main->temp - 273.15; ?>º
                            C</b><br><?php echo $json_data1->list[0]->weather[0]->main; ?>
                    </div>
                    <div class="col-sm-12"><b><?php echo $json_data1->list[0]->weather[0]->description; ?></b>
                        <p>Wind: <?php echo $json_data1->list[0]->wind->speed; ?> m/s</p></div>
                </div>
                <div class="col-sm-9">

                    <?php
                    for ($i = 0;
                    $i < count($json_data1->list);
                    $i += 8) {
                    $timestamp = $json_data1->list[$i]->dt;
                    $day = gmdate("D", $timestamp);
                    $date = gmdate("d M", $timestamp);
                    //echo $date."<br>".$day;
                    $icon = "http://openweathermap.org/img/w/" . $json_data1->list[$i]->weather[0]->icon . ".png";
                    ?>
                    <div class="single_day" class="img-responsive">
                        <div class="col-sm-12"><b><?php echo $day ?></b></div>
                        <div class="col-sm-12"><b><?php echo $date ?></b></div>
                        <div class="col-sm-12"><img src="<?php echo $icon ?>" class="img-responsive"></div>
                        <div class="col-sm-12" class="img-responsive"><img src="images/thermometer.png"> <?php echo $json_data1->list[$i]->main->temp - 273.15; ?>ºC</div>
                        <div class="col-sm-12" class="img-responsive"><img src="images/wind.png"><?php echo $json_data1->list[$i]->wind->speed; ?> m/s</div>


                        <div class="col-sm-12" class="img-responsive"><img src="images/humidity.png"> <?php echo $json_data1->list[$i]->main->humidity; ?> %</div>
                        <div class="col-sm-12" class="img-responsive"><img src="images/pressure.png"> <?php echo $json_data1->list[$i]->main->pressure; ?> hPa</div>

                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
    <div class="weather4">
        <h3 class="text-center">Weather Forecast</h3>
    </div>
</div>
</div>