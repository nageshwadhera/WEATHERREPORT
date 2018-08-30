<!DOCTYPE>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="jquery-3.2.0.min.js"></script>
    <script src="dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
//            alert("jquery ready");
            $("#form1").validate();
        })
    </script>
</head>

<body>
<?php
include "publicheader.php";
?>
<div class="container">

    <form action="public_signUp_action.php" method="post" id="form1">
        <div class="form-group">
            Enter Email address
            <input type="text" class="form-control" name="email" data-rule-required="true"
                   data-msg-required="Please enter Email Address" data-rule-email="true">
        </div>
        <div class="form-group">
            Enter Password
            <input type="password" class="form-control" name="password" data-rule-required="true"
                   data-msg-required="Password Required">
        </div>
        <div class="form-group">
            Enter Confirm Password
            <input type="password" class="form-control" name="cpassword" data-rule-required="true"
                   data-msg-required="Password Required">
        </div>
        <div class="form-group">
            Enter Fullname
            <input type="text" class="form-control" name="fullname" data-rule-required="true"
                   data-msg-required="Fullname Required">
        </div>
        <div class="form-group">
            Enter Date Of Birth
            <input type="date" class="form-control" name="dob" data-rule-required="true"
                   data-msg-required="DOB Required">
        </div>

        <div class="form-group">
            Enter Gender
            <input type="radio" name="gender" value="male" data-rule-required="true">male
            <input type="radio" name="gender" value="female" data-rule-required="true">female

        </div>

        <div class="form-group">
            Enter Mobile
            <input type="text" class="form-control" name="mobile" data-rule-required="true"
                   data-msg-required="Mobile No. Required">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="signup" data-rule-required="true">
        </div>
    </form>
    <?php
    if (isset($_GET['msg'])) {
        echo $_GET['msg'];
    }
    ?>
</div>
<?php
include 'footer.php';
?>
</body>

</html>
