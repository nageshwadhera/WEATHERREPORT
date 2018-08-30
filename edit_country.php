<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <?php
    include "connection.php";

    $id = $_REQUEST['id'];
    $s = "select * from countries WHERE id='$id'";
    $result = mysqli_query($conn,$s);
    $row = mysqli_fetch_array($result);
    ?>

    <form action="edit_count.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            Enter ISO Code
            <input type="text" class="form-control" name="iso" data-rule-required="true"
                   value="<?php echo $row[1]; ?>" >
        </div>
        <div class="form-group">
            Enter Country Name
            <input type="text" class="form-control" value="<?php echo $row[2]; ?>" data-rule-required="true" name="countrynam">
        </div>
            <div class="form-group" >
                <input type="submit" class="btn btn-success">
            </div>
    </form>
</div>
<?php
include 'footer.php';
?>