<?php
ob_start();

?>
<?php
include "adminheader.php";
?>
<!DOCTYPE>
<html>
<head>

    <script>
        function test() {


            var a, b, c;
            a = document.getElementById("iso").value;
            b = document.getElementById("countrynam").value;



            if (a == "" || b == "" ) {
                alert("all fields are manadatory");
            } else {

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("ans").innerHTML = this.responseText;
                        location.reload(true);
                    }
                };
                xmlhttp.open("GET", "insertcountry.php?iso=" + a + "&countrynam=" + b, true);
                xmlhttp.send();
            }

            }
    </script>
</head>
<body>

<div class="container">

    <input type="button" class="btn btn-success" value="Add New Country" data-toggle="modal" data-target="#myModal">

    <?php
    $s = "select * from countries";
    include "connection.php";
    $ans = "<table class='table table-responsive table-bordered '>";
    $ans = $ans . "<tr>";
    $ans = $ans . "<td>Id</td>";
    $ans = $ans . "<td>ISO Code</td>";
    $ans = $ans . "<td>Countries</td>";
    $ans = $ans . "<td>Edit</td>";
    $ans = $ans . "<td>Delete</td>";
    $ans = $ans . "</tr>";


    $result = mysqli_query($conn,$s);
    $i = 1;
    while ($row = mysqli_fetch_array($result))
    {
        $ans = $ans . "<tr>";
        $ans = $ans . "<td>" . $i . "</td>";
        $ans = $ans . "<td>" . $row[1] . "</td>";
        $ans = $ans . "<td>" . $row[2] . "</td>";
        $ans = $ans . "<td>" . "<a href='edit_country.php?id=$row[0]'> <button  class='btn-success'><span class='glyphicon glyphicon-edit'></span></button></a>" . "</td>";
        $ans = $ans . "<td>" . "<a href='delete_country.php?id=$row[0]'> <button  class='btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a>" . "</td>";

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
                    <h4 class="modal-title">Countries</h4>
                </div>
                    <div class="modal-body">
                    <div class="form-group">
                        ISO Code
                        <input type="text" class="form-control" id="iso" data-rule-required="true">
                    </div>

                    <div class="form-group">
                        Country
                        <input type="text" class="form-control" id="country" data-rule-required="true">
                    </div>
                    <div class="form-group">
                    <input type="submit" value="submit" onclick="test()" class="btn btn-success">
                    </div>
                    <div class="modal-footer">
                        <div id="ans"></div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
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