<?php

include "user_header.php";
$sel_city = "select * from city INNER JOIN user_cities on user_cities.cityid=city.id WHERE user_username='$email' AND user_cities.countryid=".$user_row['countryid'];
$res_city_name = mysqli_query($conn, $sel_city);
?>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <form action="edit_schdl.php" method="post">
        <div class="form-group">
            Enter id
            <input type="text" class="form-control" name="id" data-rule-required="true"
                   data-msg-required="Please enter Email Address" data-rule-email="true" placeholder="<?php echo $_REQUEST['id']?>" value="<?php echo $_REQUEST['id']?>" readonly >
        </div>
        <div class="form-group">
            Enter Cityname
            City:
            <select class="form-control" id="cityname" name="cityname">

                <option>Select City</option>
                <?php


                while ($row_city_name = mysqli_fetch_array($res_city_name)) {
                    ?>
                    <option value="<?php echo $row_city_name['city_name']; ?>"><?php echo $row_city_name['city_name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            Day:<br>
            <input type="radio" name="day" value="monday">Monday
            <input type="radio" name="day" value="tuesday">Tuesday
            <input type="radio" name="day" value="wednesday">Wednesday
            <input type="radio" name="day" value="thursday">Thursday
            <input type="radio" name="day" value="friday">Friday
            <input type="radio" name="day" value="saturday">Saturday
            <input type="radio" name="day" value="sunday">Sunday
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>



    </form>
</div>
<?php
include 'footer.php';
?>
</body>

