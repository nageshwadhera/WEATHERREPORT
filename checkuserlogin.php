<?php
include "connection.php";
$email=$_REQUEST['email'];
$password=$_REQUEST['password'];

$s="select * from signup where email='$email'";
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);

if(mysqli_num_rows($result)<=0)
{
    header("Location:userlogin.php?er=Username does not Exist");
}
else
{
    if($password==$row[1])
    {
        session_start();
        $_SESSION['useremail']=$email;
        header("Location:userhome.php");
    }
    else
    {
        header("Location:userlogin.php?er=Incorrect Password");
    }
}
