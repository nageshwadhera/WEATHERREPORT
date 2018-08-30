<!DOCTYPE>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function () {
            $("#form").validate();

        })
    </script>



</head>
<body>
<?php
include 'publicheader.php';
?>
<div class="container">
    <form action="public_signUp_action.php" id="form">
    <div class="form-group">
        Enter Email Address
        <input type="text" class="form-control" data-rule-email="true" data-rule-required="true" id="email">
    </div>
    <div class="form-group">
        Enter Password
        <input type="password" class="form-control" id="password" data-rule-required="true">
    </div>
        <div class="form-group">
            Enter Confirm Password
            <input type="password" class="form-control" id="cpassword" data-rule-required="true"
                   data-msg-required="Password Required">
        </div>
    <div class="form-group">
        Enter Fullname
        <input type="text" class="form-control" id="fullname" data-rule-required="true">
    </div>
    <div class="form-group">
        Enter Gender
        <select id="gender" class="form-control" data-rule-required="true">
            <option>Male</option>
            <option>Female</option>
        </select>
    </div>

    <div class="form-group">
        Enter Mobile
        <input type="text" class="form-control" id="mobile" data-rule-required="true">
    </div>
        <div class="form-group">
        date of birth
        <input type="text" class="form-control" id="dob" data-rule-required="true">
        </div>
         <div class="form-group">
         <input type="submit"  value="login" class="btn btn-success">
         </div>
    </form>
</div>
<?php
include 'footer.php';
?>
</body>
</html>








