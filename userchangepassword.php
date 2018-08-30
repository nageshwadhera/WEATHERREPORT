<!DOCTYPE>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php

include "user_header.php";
include "connection.php";
$userpass = "select * from signup WHERE email='$email'";
$res_userpass = mysqli_query($conn, $userpass);
$row_userpass = mysqli_fetch_array($res_userpass);
?>
<form action="userchangepasswordaction.php" method="post">
    <div class="container">
        <div class="form-group">
            username
            <input type="text" class="form-control" name="username" id="username" readonly
                   placeholder="<?php echo $_SESSION["useremail"] ?>">
        </div>
        <div class="form-group">
            enter old password
            <input type="password" class="form-control" name="oldpassword" id="oldpassword">
        </div>
        <div class="form-group">
            enter new password
            <input type="password" class="form-control" name="newpassword" id="newpassword">
        </div>
        <div class="form-group">
            confirm new password
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="submit">
        </div>
    </div>
    <div class="text-center">
        <?php
        if (isset($_REQUEST['er'])) {
            $er = $_REQUEST['er'];
            if ($er == 1) {
                echo '<span class="alert alert-danger">Email and Password does not Match</span>';
            } elseif ($er == 2) {
                echo '<span class="alert alert-danger">Password and Confirm Password does not Match</span>';
            } else {
                echo '<span class="alert alert-success">Password has been changed Successfully</span>';
            }
        }
        ?>
    </div>

</form>
<?php
include 'footer.php';
?>
</body>
</html>