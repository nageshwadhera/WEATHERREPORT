<?php
if(!isset($_REQUEST['type']))
{
?>

<!DOCTYPE>
<html>

<head>

</head>

<body>
<form action="assigncities.php" method="post">
    <?php
    include "user_header.php";
    }
include 'header_files.php';
    include 'connection.php';
    $country = $_REQUEST['country'];
    ?>
    <input type="hidden" name="country" value="<?php echo $country ?>">
    <div class="container">


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

                <?php
                foreach (range('A', 'Z') as $char) {

                    ?>
                    <div id="<?php echo $char ?>">
                        <?php
                        $s = "select * from city WHERE countryid=" . $country . " and city_name like '" . $char . "%' group by city_name  ORDER BY city_name ASC";
                        $result = mysqli_query($conn, $s);
                        if(mysqli_num_rows($result)>0) {
                            while ($row = mysqli_fetch_array($result)) {

                                ?>
                                <div class="col-sm-3"><input type="checkbox" name="cities[]"
                                                             value="<?php echo $row[0] ?>"> <?php echo $row[2] ?></div>
                                <?php
                            }
                        }
                        else
                        {
                            echo 'No Cities with '.$char;
                        }
                        ?>

                        <div class="row">
                            <div class="col-sm-12 text-right"><input type="submit" value="Next" class="btn btn-primary">
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
    <?php
    if(!isset($_REQUEST['type'])) {
        ?>
        </form>
        </body>
        </html>
        <?php
    }
    ?>
<?php
include 'footer.php';
?>
