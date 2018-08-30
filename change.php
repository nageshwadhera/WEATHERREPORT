<?php
session_start();
$username = $_SESSION["email"];
$oldpassword = $_REQUEST["oldpassword"];
$newpassword = $_REQUEST["newpassword"];
$confirmnewpassword = $_REQUEST["confirmpassword"];

include "connection.php";

$flag=0;
$sql="select * from admin";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result))
{

    if($username==$row[0] && $oldpassword==$row[1])
    {
        $flag=1;
        break;
    }
}

if($flag!=1)
{
    //header("Location:changepassword.php?er=1");
}
elseif ($newpassword!=$confirmnewpassword)
{
    header("Location:changepassword.php?er=2");
}
else
{
    $s="update admin set password='".$newpassword."' where username='".$username."'";
    mysqli_query($conn,$s);
    header("Location:changepassword.php?er=3");
}
?>