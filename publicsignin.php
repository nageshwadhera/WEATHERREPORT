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

    <form action="check_public_login.php" method="post">
        <div class="form-group">
            Enter Email Address
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            Enter Password
            <input type="password" class="form-control" name="pass" id="pass">

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="signin">
        </div>
    </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>