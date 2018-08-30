<?php
include "connection.php";

$sel_countries = "select * from countries";
$res_countryname = mysqli_query($conn, $sel_countries);

$get_countryname = "[";

while ($row_countryname = mysqli_fetch_array($res_countryname)) {
    $get_countryname .= "'" . $row_countryname['countryname'] . "',";
}
$get_countryname = trim($get_countryname, ",");
$get_countryname .= "]";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="jquery-ui.css">
    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.js"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-3 col-md-3">
            <div class="form-group">
                <input type="text" id="ctrname" class="form-control">
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3"></div>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>