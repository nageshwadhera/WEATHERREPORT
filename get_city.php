<?php
include 'connection.php';
session_start();
$country=$_REQUEST['country'];

$email = $_SESSION['useremail'];
foreach (range('A', 'Z') as $char) {

    $s = "select * from city  WHERE countryid='$country' and city_name like '" . $char . "%' group by city_name  ORDER BY city_name ASC";
    //echo $s;
    $result = mysqli_query($conn, $s);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $sql = "select * from user_cities where cityid=" . $row[0] . " and user_username='$email' and countryid='$country'";
            //echo $sql;
            $sql_result = mysqli_query($conn, $sql);
            ?>
            <div class="col-sm-3"><input type="checkbox" name="cities[]"
                                         <?php if (mysqli_num_rows($sql_result) > 0){ ?>checked<?php } ?>
                                         value="<?php echo $row[0] ?>"> <?php echo $row[2] ?>
            </div>
            <?php
        }
    } else {
        echo 'No Cities with ' . $char;
    }
    ?>

    <div class="row">
        <div class="col-sm-12 text-right"><input type="submit" value="Next"
                                                 class="btn btn-primary">
        </div>
        <br><br>
    </div>

    <?php
    echo '!@#$%^';
}

?>