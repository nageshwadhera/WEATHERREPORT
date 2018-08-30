<?php
ob_start();
?>
<!DOCTYPE>
<html>
<head>
    <script>

    </script>

</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">


    <input type="button" class="btn btn-success" value="Add New City" data-toggle="modal" data-target="#myModal">
    <form action="" method="post">
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
                    <option value="<?php echo $country_row[0] ?>"><?php echo $country_row[2] ?></option>
                    <?php
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Go">
        </div>
    </form>
    <?php
    if(isset($_REQUEST['country'])) {
        $country = $_REQUEST['country'];

        $s = "select * from city WHERE countryid=" . $country;
        include "connection.php";

        $ans = "<table class='table table-responsive table-bordered '>";
        $ans = $ans . "<tr>";
        $ans = $ans . "<td>Sr No.</td>";
        $ans = $ans . "<td>City Id</td>";
        $ans = $ans . "<td>City Name</td>";
        $ans = $ans . "<td>Longotude</td>";
        $ans = $ans . "<td>Latitude</td>";
        $ans = $ans . "<td>Country ID</td>";
        $ans = $ans . "<td>Edit</td>";
        $ans = $ans . "<td>Delete</td>";
        $ans = $ans . "</tr>";

        $result = mysqli_query($conn, $s);
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            $ans = $ans . "<tr>";
            $ans = $ans . "<td>" . $i . "</td>";
            $ans = $ans . "<td>" . $row[0] . "</td>";
            $ans = $ans . "<td>" . $row[2] . "</td>";
            $ans = $ans . "<td>" . $row[3] . "</td>";
            $ans = $ans . "<td>" . $row[4] . "</td>";
            $ans = $ans . "<td>" . $row[5] . "</td>";
            $ans = $ans . "<td>" . "<a href='edit_city.php?id=$row[0]'> <button  class='btn-success'><span class='glyphicon glyphicon-edit'></span></button></a>" . "</td>";
            $ans = $ans . "<td>" . "<a href='delete_city.php?id=$row[0]'> <button  class='btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a>" . "</td>";

            $ans = $ans . "</tr>";
            $i++;

        }

        $ans = $ans . "</table>";

        echo $ans;
    }
    ?>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
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
                                <option value="<?php echo $country_row[0] ?>"><?php echo $country_row[2] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        City ID
                        <input type="text" class="form-control" name="cityid" id="cityid" data-rule-required="true"
                               data-msg-required="City name required">
                    </div>
                    <div class="form-group">
                        City Name
                        <input type="text" class="form-control" name="cityname" id="cityname" data-rule-required="true"
                               data-msg-required="City name required">
                    </div>

                    <div class="form-group">
                        Latitude
                        <input type="text" class="form-control" name="latitude" id="latitude" data-rule-required="true"
                               data-msg-required="latitude Required">
                    </div>

                    <div class="form-group">
                        Longitude
                        <input type="text" class="form-control" name="longitude" id="longitude" data-rule-required="true"
                               data-msg-required="longitude Required">
                    </div>
                    <div class="form-group">
                        <input type="button" onclick="insert_city()" value="Add New City">
                    </div>
                    <div id="ans">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
<?php
include 'footer.php';
?>
</body>


</html>