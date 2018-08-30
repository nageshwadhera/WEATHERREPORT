<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include "user_header.php";
$sel_city = "select * from city INNER JOIN user_cities on user_cities.cityid=city.id WHERE user_username='$email' AND user_cities.countryid=".$user_row['countryid'];
$res_city_name = mysqli_query($conn, $sel_city);
?>
<div class="container">
    <div class="form-group">
        City
        <select class="form-control" onchange="forecast(this.value)">
            <option>Select City</option>
                <?php


                    while ($row_city_name = mysqli_fetch_array($res_city_name)) {
                        ?>
                        <option value="<?php echo $row_city_name['city_id']; ?>"><?php echo $row_city_name['city_name'] ?></option>
                        <?php
                    }
                ?>
        </select>
    </div>
    <div id="weather_forecast"></div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>

