<?php
include "connection.php";
session_start();
$cityid=$_REQUEST['cityid'];
$dayar = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

?>

<div class="form-group" id="outerdays">
    Day:<br>
    <div id="daysdiv">
        <input type="checkbox" name="alldays" value="All" id="alldays">All
        <?php
        foreach ($dayar as $day)
        {
            $show="select * from schedule inner join city on city.city_id=schedule.city_name where email='".$_SESSION["useremail"]."' and day='$day' and schedule.city_name='$cityid'";
            //echo $show;
            $ress=mysqli_query($conn,$show);
            ?>
            <input type="checkbox" name="days[]" <?php if(mysqli_num_rows($ress)>0) {  ?>checked<?php  } ?> value="<?php echo $day ?>"><?php echo $day ?>
        <?php
        }
        ?>

    </div>

</div>
