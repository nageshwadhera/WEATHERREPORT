<!DOCTYPE>
<html>


<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        function test() {
            alert("testing");
            var a,b,c;
            a=document.getElementById("textbox1").value;
            b=document.getElementById("textbox2").value;
            c=document.getElementById("select1").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ans").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxinsertuser.php?textbox1=" + a+"&textbox2="+b+"&select1="+c, true);
            xmlhttp.send();



        }
    </script>

</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">


    <input type="button" class="btn btn-success" value="Add New Admin" data-toggle="modal" data-target="#myModal" >

    <?php

    $s="select * from admins";
    include "connection.php";;

    $ans="<table class='table'>";
    $ans=$ans."<tr>";
    $ans=$ans."<td>Sr No.</td>";
    $ans=$ans."<td>Email</td>";
    $ans=$ans."<td>Type</td>";
    $ans=$ans."</tr>";

    $result=mysqli_query($conn,$s);
    $i=1;
    while($row=mysqli_fetch_array($result))
    {
        $ans=$ans."<tr>";
        $ans=$ans."<td>".$i."</td>";
        $ans=$ans."<td>".$row[0]."</td>";
        $ans=$ans."<td>".$row[2]."</td>";
        $ans=$ans."</tr>";
        $i++;

    }

    $ans=$ans."</table>";

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
                        Enter Email Address
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        Enter Password
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        Enter Fullnme
                        <input type="text" class="form-control" id="fullname">
                    </div>
                    <div class="form-group">
                        Enter Gender
                        <select id="gender" class="form-control">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        Enter Mobile
                        <input type="text" class="form-control" id="mobile">
                    </div>

                    <div class="form-group">
                        date of birth
                        <input type="text" class="form-control" id="dob">
                    </div>
                        <input type="submit" onclick="test()" value="Add New user">
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