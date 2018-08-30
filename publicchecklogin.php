<?php

include "connection.php";

$s="select * from public_signUp";

$result=mysqli_query($conn,$s);
$flag=0;
while($row=mysqli_fetch_array($result))
{
    if($row[0]==$_REQUEST["email"] && $row[1]==$_REQUEST["textbox2"])
    {
        $flag=1;
        break;
    }
}

if($flag==1)
{
    session_start();
    $_SESSION["useremail"]=$_REQUEST["email"];
    header("location: userhome.php");
}
else
{
    echo "Wrong user name and password";
    header("location: public_login.php?er=1");
}






