<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <form method="post" action="json.php">
        <div class="form-group">
            Enter City Name
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>