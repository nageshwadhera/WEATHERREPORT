<?php
ob_start();
error_reporting(0);
session_start();
if (isset($_SESSION['useremail'])) {
    include 'user_header.php';
} else {
    include 'adminheader.php';
}
$id=$_REQUEST['q'];
$s="delete from photo_video WHERE id=".$id;
mysqli_query($conn,$s);
header("Location:view-photo-video.php");