<?php
$city_name=$_REQUEST['q'];
$url = "api.openweathermap.org/data/2.5/weather?q=" . $city_name . "&APPID=ba5b8c784b77da73e2f0775e258fdd05";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$result = $curl_scraped_page;
$json_data = json_decode($result);
//print_r($json_data);
$dt = date('Y-m-d');
$tym = date('H:i:s');
$icon = "http://openweathermap.org/img/w/" . $json_data->weather[0]->icon . ".png";
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/mystyle.css">
<?php
include 'publicheader.php';
?>
<div class="container">
    <h1 class="text-center">Weather Report of <?php echo $city_name ?></h1>
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
                <div class="col-sm-6"><h1><?php echo $json_data->main->temp - 273.15; ?>º C</h1></div>
                <div class="col-sm-6">
                    <h4>Details</h4>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">Feels Like</div>
                        <div class="col-sm-6"><b><?php echo $json_data->main->temp - 273.15; ?>º C</b></div>
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
                <h2><?php echo $city_name ?>, <?php echo $json_data->sys->country; ?></h2>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="weather2">
                <div class="row">
                    <div class="col-sm-6"><img src="<?php echo $icon ?>"></div>
                    <div class="col-sm-6"><b><?php echo $json_data->main->temp - 273.15; ?>º
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
    <div class="col-sm-12 text-right">

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <br><br>
        <div class="fb-share-button" data-href="<?php echo $_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&amp;src=sdkpreparse">Share</a></div>
        <a class="twitter-share-button"
           href="https://twitter.com/intent/tweet?text=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>"
           data-size="large">
            <input type="button" value="Share on Twitter" class="btn btn-primary"></a>
    </div>
    <a href="weather_show.php"><input type="button" value="Back" class="btn btn-primary"></a>
</div>

<?php
include 'footer.php';
