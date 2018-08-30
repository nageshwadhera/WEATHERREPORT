<!DOCTYPE>
<html>

<head>
<link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<?php

include "adminheader.php";
?>
<div class="container">
    <br><br><br><br><br><br><br><br><br><br><br>
    <h1>Welcome to admin Home <?php echo $_SESSION["email"] ?></h1>
    <br><br><br><br><br><br><br><br><br><br><br>
</div>
<?php
include 'footer.php';
?>
</body>
</html>