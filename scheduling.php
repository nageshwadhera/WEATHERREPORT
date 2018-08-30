<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">


</head>
<body>

<?php

include "user_header.php";
$sel_city = "select * from city INNER JOIN user_cities on user_cities.cityid=city.id WHERE user_username='$email' AND user_cities.countryid=" . $user_row['countryid'];
$res_city_name = mysqli_query($conn, $sel_city);
?>
<form action="insert_schedule.php?id=1" method="post">
    <div class="container">
        <div class="form-group">
            City:
            <select class="form-control" id="city" name="city" onchange="updateschedule(this.value)">

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
        <div class="form-group" id="outerdays">
            Day:<br>
            <div id="daysdiv">
                <input type="checkbox" name="alldays" value="All" id="alldays">All
                <input type="checkbox" name="days[]" value="Monday">Monday
                <input type="checkbox" name="days[]" value="Tuesday">Tuesday
                <input type="checkbox" name="days[]" value="Wednesday">Wednesday
                <input type="checkbox" name="days[]" value="Thursday">Thursday
                <input type="checkbox" name="days[]" value="Friday">Friday
                <input type="checkbox" name="days[]" value="Saturday">Saturday
                <input type="checkbox" name="days[]" value="Sunday">Sunday
            </div>

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Schedule">
        </div>

</form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>