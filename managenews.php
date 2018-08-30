<!DOCTYPE>
<html>


<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="jquery-3.2.0.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        function test() {
            //alert("testing");
            var a,b,c;
            a=document.getElementById("newstitle").value;
            b=document.getElementById("news").value;
            c=document.getElementById("dateofnews").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ans").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "ajaxinsertnews.php?newstitle=" + a+"&news="+b+"&dateofnews="+c, true);
            xmlhttp.send();



        }
    </script>

</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">


    <input type="button" class="btn btn-success" value="Add News" data-toggle="modal" data-target="#myModal" >

    <?php

    $s="select * from news";
    include "connection.php";;

    $ans="<table class='table'>";
    $ans=$ans."<tr>";
    $ans=$ans."<td>ID.</td>";
    $ans=$ans."<td>news title</td>";
    $ans=$ans."<td>news</td>";
    $ans=$ans."<td>Date of News</td>";
    $ans=$ans."<th colspan='2' class=''>Controls</th>";
    $ans=$ans."</tr>";

    $result=mysqli_query($conn,$s);

    while($row=mysqli_fetch_array($result))
    {
        $ans=$ans."<tr>";

        $ans=$ans."<td>".$row[0]."</td>";
        $ans=$ans."<td>".$row[1]."</td>";
        $ans=$ans."<td>".$row[2]."</td>";
        $ans=$ans."<td>".$row[3]."</td>";
        $ans = $ans . '<td><a href="edit_news.php?newsid=' .$row[0] . '">Edit</a></td>';
        $ans = $ans . '<td><a href="delete_news.php?newsid=' . $row[0] . '" >Delete</a></td>';
        $ans=$ans."</tr>";


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

                        Enter News Title
                        <input type="text" class="form-control" id="newstitle">
                    </div>
                    <div class="form-group">
                        News
                        <input type="text" class="form-control" id="news">
                    </div>
                    <div class="form-group">
                        Date of News
                        <input type="date" class="form-control" id="dateofnews">
                    </div>


                    <div class="form-group">
                        <input type="button" onclick="test()" value="Add News">
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