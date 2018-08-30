<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include "user_header.php";
?>
<form action="update_user_city.php" method="post">
<div class="container">
    <div class="form-group">
        Country
        <select onchange="updateCity(this.value,'update')" name="country" class="form-control">
            <option>Select Country</option>

            <?php
            include "connection.php";
            $sel_countries = "select * from countries";
            $res_countryname = mysqli_query($conn, $sel_countries);
            while ($row_countryname = mysqli_fetch_array($res_countryname)) {
                ?>
                <option value="<?php echo $row_countryname['id']; ?>"
                        <?php if ($row_countryname[0] == $user_row[1]) { ?>selected<?php } ?>><?php echo $row_countryname['countryname'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div id="cities">
        <div class="row">
            <h3 class="text-center">Choose your Favorite City Alphabetically</h3>
            <div id="tabs">
                <ul>
                    <?php
                    foreach (range('A', 'Z') as $char) {
                        ?>
                        <li>
                            <a href="#<?php echo $char ?>"><?php echo $char ?></a>
                        </li>
                        <?php

                    }
                    ?>
                </ul>
                <div id="query1"></div>
                    <?php
                    foreach (range('A', 'Z') as $char) {

                        ?>
                        <div id="<?php echo $char ?>">

                            <?php
                            //echo $user_row[1];
                            $s = "select * from city  WHERE countryid=" . $user_row[1] . " and city_name like '" . $char . "%' group by city_name  ORDER BY city_name ASC";

                            $result = mysqli_query($conn, $s);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $sql = "select * from user_cities where cityid=" . $row[0] . " and user_username='$email' and countryid=" . $user_row[1];
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
                        </div>
                        <?php
                    }
                    ?>

            </div>
        </div>
    </div>
</div>
</form>
<?php
include 'footer.php';
?>
</body>
</html>