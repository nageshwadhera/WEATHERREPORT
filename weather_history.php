<?php
include 'user_header.php';
$sel_city = "select * from city INNER JOIN user_cities on user_cities.cityid=city.id WHERE user_username='$email' AND user_cities.countryid=" . $user_row['countryid'];
$res_city_name = mysqli_query($conn, $sel_city);
?>
<div class="container">
    <h1 class="text-center">Weather History</h1>
    <div class="row">
        <div class="form-group">
            City
            <select class="form-control" name="city" id="city">
                <option>Select City</option>
                <?php


                while ($row_city_name = mysqli_fetch_array($res_city_name)) {
                    ?>
                    <option value="<?php echo $row_city_name['city_id'].'_'.$row_city_name['city_name']; ?>"><?php echo $row_city_name['city_name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1"><label for="from">From</label></div>
        <div class="col-sm-4"><input type="text" name="from" id="from" class="form-control"></div>
        <div class="col-sm-1"><label for="to">To</label></div>
        <div class="col-sm-4"><input type="text" name="to" id="to" class="form-control"></div>
        <div class="col-sm-2"><input type="button" class="btn btn-primary" value="Go" onclick="historical_data()"></div>
    </div>
    <div id="result"></div>
</div>

<?php
include 'footer.php';
?>