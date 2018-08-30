<!doctype html>
<html lang="en">
<head>
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<div>
<?php
include 'adminheader.php';
?>
<?php
$s="select * from news WHERE newsid='".$_REQUEST["newsid"]."'";
include "connection.php";
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
?>

<div class="container">
    <form id="news_form" action="edit_news_action.php" method="post">
        <div class="form-group">
            Enter newsid
            <input readonly type="text" value="<?php echo $_REQUEST["newsid"]?>" class="form-control" name="newsid" id="newsid">
        <div class="form-group">
            Enter News Title
            <input type="text" value="<?php echo $row[1]?>" class="form-control" id="newstitle" name="newstitle">
        </div>
        <div class="form-group">
            News
            <input type="text" value="<?php echo $row[2]?>" class="form-control" name="news">
        </div>
        <div class="form-group">
            Date of News
            <input type="text" value="<?php echo $row[3]?>" class="form-control" name="dateofnews">
        </div>


        <div class="form-group">
            <input type="submit" value="change news" class="btn btn-success">
        </div>
    </form>
</div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>