<!DOCTYPE>
<html>

<head>
<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<?php
include "publicheader.php";
?>
<div class="container">

    <form action="checklogin.php" method="post">
    <div class="form-group">
        Enter Email address
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        Enter Password
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="login">
    </div>
    </form>
</div>
<?php
include 'footer.php';
?>
</body>

</html>