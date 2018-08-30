<?php
include 'connection.php';
session_start();
$email = $_SESSION['useremail'];
$city_data=explode('_',$_REQUEST['cityid']);
$cityid = $city_data[0];
$cityname = $city_data[1];
$from = $_REQUEST['from'];
$to = $_REQUEST['to'];
$history = "SELECT * 
FROM  `weather_history` 
WHERE DATE
BETWEEN  '$from'
AND  '$to'
AND email =  '$email' and weather_history.apicity_id='$cityid' ORDER  by id desc";
//echo $history;
$history_result = mysqli_query($conn, $history);
if (mysqli_num_rows($history_result) <= 0) {
    echo 'No Data Found';
} else {
    ?>
    <h2 class="text-center">Weather History of <?php echo $cityname ?> from <?php echo $from ?> To <?php echo $to ?></h2>
    <table class="table table-hover">
        <tr>
            <th>Sr no.</th>

            <th>Date</th>
            <th>Weather</th>
            <th>Temp</th>
            <th>Wind</th>
            <th>Humidity</th>
            <th>Pressure</th>
        </tr>
        <?php
        $i=0;
        while ($history_row=mysqli_fetch_array($history_result))
        {
            ?>
            <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $history_row['date'] ?></td>
                <td><?php echo $history_row['weathermain'] ?>(<small><?php echo $history_row['weatherdes'] ?></small>) <img src="<?php echo $history_row['icon'] ?>" class="img-responsive"></td>
                <td><?php echo $history_row['temp'] ?>º C</td>
                <td><?php echo $history_row['wind'] ?>m/s</td>
                <td><?php echo $history_row['humidity'] ?>%</td>
                <td><?php echo $history_row['pressure'] ?>hPa</td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>