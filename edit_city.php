<?php
include 'adminheader.php';
$id=$_REQUEST['id'];
$s="select * from city WHERE  id=".$id;
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
?>
<div class="container">
    <h1 class="text-center">Update City</h1>
    <form action="save_city.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
            Country
            <select class="form-control" name="country" id="country" data-rule-required="true"
                    data-msg-required="City name required">
                <option>--Choose--</option>
                <?php
                $country="select * from countries";
                $country_result=mysqli_query($conn,$country);
                while ($country_row=mysqli_fetch_array($country_result))
                {
                    ?>
                    <option value="<?php echo $country_row[0] ?>" <?php if($row[5]==$country_row[0]) {   ?>selected<?php   } ?>><?php echo $country_row[2] ?></option>
                    <?php
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            City ID
            <input type="text" class="form-control" name="cityid" id="cityid" data-rule-required="true" value="<?php echo $row[1] ?>"
                   data-msg-required="City name required">
        </div>
        <div class="form-group">
            City Name
            <input type="text" class="form-control" name="cityname" id="cityname" data-rule-required="true" value="<?php echo $row[2] ?>"
                   data-msg-required="City name required">
        </div>

        <div class="form-group">
            Latitude
            <input type="text" class="form-control" name="latitude" id="latitude" data-rule-required="true" value="<?php echo $row[3] ?>"
                   data-msg-required="latitude Required">
        </div>

        <div class="form-group">
            Longitude
            <input type="text" class="form-control" name="longitude" id="longitude" data-rule-required="true" value="<?php echo $row[4] ?>"
                   data-msg-required="longitude Required">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update City</button>
        </div>
    </form>

</div>
<?php
include 'footer.php';