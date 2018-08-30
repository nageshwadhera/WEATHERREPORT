<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include "adminheader.php";
$s="select * from admin where username='".$_REQUEST['id']."'";
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
?>
<div class="container">

    <form action="edit_admn.php" method="post">
                <div class="form-group">
                    Enter Email address
                    <input type="text" class="form-control" name="email" data-rule-required="true"
                          data-msg-required="Please enter Email Address" data-rule-email="true" value="<?php echo $_REQUEST['id']?>" readonly >
                </div>
                <div class="form-group">
                    Enter Fullname
                    <input type="text" class="form-control"  data-rule-required="true" value="<?php echo $row[2] ?>"
                           data-msg-required="Password Required"name="fullname">
                </div>
                <div class="form-group">
                    Gender<br>
                    <input type="radio" name="gender" value="Male" id="male" <?php if ($row[3]=='Male')  {   ?>checked<?php   } ?> data-rule-required="true">Male
                    <input type="radio" name="gender" value="Female" id="female" <?php if ($row[3]=='Female')  {   ?>checked<?php   } ?> data-rule-required="true">Female

                </div>
                <div class="form-group">
                    Enter Mobile
                    <input type="text" class="form-control" name="mobile" data-rule-required="true" value="<?php echo $row[4] ?>"
                           data-msg-required="Password Required">
                </div>

                <div class="form-group">
                    Select Admin Type
                    <select name="type" class="form-control">
                        <option <?php if($row[5]=='Admin') {   ?>selected<?php   } ?>>Admin</option>
                        <option <?php if($row[5]=='Limited User') {   ?>selected<?php   } ?>>Limited User</option>
                    </select>
                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-success">
                </div>



</form>
            </div>
</body>


<?php
include 'footer.php';
?>


</html>




