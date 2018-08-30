<?php
ob_start();
?>
<!DOCTYPE>
<html>

<head>

</head>

<body onload="showcountry()">
<?php
include "user_header.php";
?>
<div class="container">
    <?php

    $sql="select * from user_cities where user_username='$email'";
    $sql_result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($sql_result)<=0) {
        ?>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title">Choose the Favorite Cities</h4>
                    </div>
                    <div class="modal-body">
                        <select name="country" id="country" class="form-control">
                            <option>--Choose--</option>
                            <?php
                            $s = "select * from countries";
                            $result = mysqli_query($conn, $s);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <div class="text-right"><input type="button" onclick="show_city()" value="Next"
                                                       class="btn btn-primary"></div>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }
    else
    {
        header("Location:weather_show.php");
    }
    ?>
</div>
<?php
include 'footer.php';
?>
</body>
</html>