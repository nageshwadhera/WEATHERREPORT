<html>
<head>
    <title></title>
    <link href="css/bootstrap.css"rel="stylesheet">
    <script src="lib/jquery.js"></script>
    <script src="dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {$("form").validate();ID$("#form").validate();


        })
    </script>
    <style>
        .error{color:red;}
    </style>
</head>
<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form action="signupaction.php "method="post">
            <div class="form-group">
                <label>username</label>
                <input type="text" name="tbuname" data-rule-required="true" data-msg-required="enter username"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="text" name="tbpass" id="tbpass" data-rule-required="true" data-msg-required="enter password"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>confirm password</label>
                <input type="text" name="tbuname" data-rule-equalto="#pass" data-msg-equalto="password& confirm password are not match"
                       data-rule-required="true" data-msg-required="enter confirm password"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="tbname" data-rule-required="true" data-msg-required="enter name"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>gender</label>
                <input type="radio" name="tbgender" checked value="male">male
                <input type="radio" name="tbgender" checked value=""female">female

            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="tbaddress" data-rule-required="true" data-msg-required="enter address"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" name="tbemail" data-rule-required="true" data-msg-required="enter valid email"
                       class="form-control">
            </div>
            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" name="tbmob" data-rule-required="true" data-msg-required="enter Mobile no"
                       class="form-control">
            </div><div class="form-group">
                <label>country</label>
                <select name="tbcountry"  data-rule-required="true" data-msg-required="select country"
                        class="form-control">
                    <otion value="">select country</otion>
                    <option value="INDIA">INDIA</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>

            </div>
            <div class="form-group">
                <input type="submit" value="signup" class="btn btn-primary/success">
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>