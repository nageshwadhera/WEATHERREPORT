<?php
ob_start();
?>
<!DOCTYPE>
<html>


<head>

    <script>
        function test() {

            //alert("testing");
            var a, b, c, d, e, f, gender;
            a = document.getElementById("email").value;
            b = document.getElementById("fullname").value;
            c = document.getElementById("password").value;
            d = document.getElementById("cpassword").value;
            e = document.getElementById("mobile").value;
            f = document.getElementById("type").value;

            if (document.getElementById('male').checked) {
                gender = 'Male';
            }
            else {
                gender = 'Female';
            }

            if (a === "" || b === "" || c === "" || d === "" || e === "" || f === "") {
                alert("all fields are manadatory");
            } else {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ans").innerHTML = this.responseText;
                        window.location.href="manageadmin.php";
                    }
                };
                xmlhttp.open("GET", "ajaxinsertuser.php?email=" + a + "&fullname=" + b + "&password=" + c +
                    "&cpassword=" + d + "&mobile=" + e + "&type=" + f + "&gender=" + gender, true);
                xmlhttp.send();


            }
        }
    </script>

</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">


    <input type="button" class="btn btn-success" value="Add New Admin" data-toggle="modal" data-target="#myModal">

    <?php

    $s = "select * from admin WHERE username!='$email'";
    include "connection.php";

    $ans = "<table class='table table-responsive table-bordered '>";
    $ans = $ans . "<tr>";
    $ans = $ans . "<td>Sr No.</td>";
    $ans = $ans . "<td>Email</td>";
    $ans = $ans . "<td>Fullname</td>";
    $ans = $ans . "<td>gender</td>";
    $ans = $ans . "<td>mobile</td>";
    $ans = $ans . "<td>type</td>";
    $ans = $ans . "<td>Edit</td>";
    $ans = $ans . "<td>Delete</td>";
    $ans = $ans . "</tr>";

    $result = mysqli_query($conn, $s);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        $ans = $ans . "<tr>";
        $ans = $ans . "<td>" . $i . "</td>";
        $ans = $ans . "<td>" . $row[0] . "</td>";
        $ans = $ans . "<td>" . $row[2] . "</td>";
        $ans = $ans . "<td>" . $row[3] . "</td>";
        $ans = $ans . "<td>" . $row[4] . "</td>";
        $ans = $ans . "<td>" . $row[5] . "</td>";
        $ans = $ans . "<td>" . "<a href='edit_admin.php?id=$row[0]'> <button  class='btn-success'><span class='glyphicon glyphicon-edit'></span></button></a>" . "</td>";
        $ans = $ans . "<td>" . "<a href='delete_admin.php?id=$row[0]'> <button  class='btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a>" . "</td>";

        $ans = $ans . "</tr>";
        $i++;

    }

    $ans = $ans . "</table>";

    echo $ans;

    ?>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        Enter Email address
                        <input type="email" class="form-control" id="email" data-rule-required="true"
                               data-msg-required="Please enter Email Address" data-rule-email="true">
                    </div>
                    <div class="form-group">
                        Enter Password
                        <input type="password" class="form-control" id="password" data-rule-required="true"
                               data-msg-required="Password Required">
                    </div>
                    <div class="form-group">
                        Enter Confirm Password
                        <input type="password" class="form-control" id="cpassword" data-rule-required="true"
                               data-msg-required="Password Required">
                    </div>
                    <div class="form-group">
                        Enter Fullname
                        <input type="text" class="form-control" id="fullname" data-rule-required="true"
                               data-msg-required="Password Required">
                    </div>
                    <div class="form-group">
                        Gender<br>
                        <input type="radio" name="gender" value="Male" id="male" data-rule-required="true">male
                        <input type="radio" name="gender" value="Female" id="female" data-rule-required="true">female

                    </div>
                    <div class="form-group">
                        Enter Mobile
                        <input type="text" class="form-control" id="mobile" data-rule-required="true"
                               data-msg-required="Password Required">
                    </div>

                    <div class="form-group">
                        Select Admin Type
                        <select id="type" class="form-control">
                            <option>Admin</option>
                            <option>Limited User</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="button" onclick="test()" value="Add New user">
                    </div>
                    <div id="ans">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
<?php
include 'footer.php';
?>
</body>


</html>