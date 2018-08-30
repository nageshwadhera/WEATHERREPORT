<!DOCTYPE>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
<?php
session_start();
include "publicheader.php";
?>
<div class="container">

    <h1 class="text-center">Welcome to public Home <?php echo $_SESSION["email"] ?></h1>

</div>
<?php
include 'footer.php';
?>
</body>
</html>