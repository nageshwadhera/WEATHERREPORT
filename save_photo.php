<?php
ob_start();
error_reporting(0);
session_start();
if (isset($_SESSION['useremail'])) {
    include 'user_header.php';
} else {
    include 'adminheader.php';
}
$photoid = $_REQUEST['photoid'];
$type = $_REQUEST['type'];
$photo_video = $_FILES['photo_video']['name'];
$temp = $_FILES['photo_video']['tmp_name'];
$ext = strtolower(pathinfo($photo_video, PATHINFO_EXTENSION));
$caption = urlencode($_REQUEST['caption']);
$description = urlencode($_REQUEST['description']);
date_default_timezone_set("Asia/Kolkata");
$dt = date('Y-m-d');
$tym = date("H:i:s");
echo $ext;


echo $type;

if ($type == 'video') {
    if ($photo_video != '') {
        if ($ext != 'mp4') {
            echo 'video';
            header("Location:photo-video.php?er=3");
        } else {

            echo 'gjdfjhjdf';
            $path = "photo-videos/" . $photo_video;
            move_uploaded_file($temp, $path);
            $update = "update photo_video set photo='$path',type='$type',caption='$caption',description='$description',date='$dt',time='$tym' WHERE id=".$photoid;
            mysqli_query($conn, $update);
            header("Location:view-photo-video.php");
        }
    }
    else
    {
        echo 'gfghgj';
        $update = "update photo_video set type='$type',caption='$caption',description='$description',date='$dt',time='$tym' WHERE id=\".$photoid";
        mysqli_query($conn, $update);
        header("Location:view-photo-video.php");
    }
} elseif ($type == 'photo') {
    if ($photo_video != '') {
        if ($ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'jpeg') {
            echo 'gjdfjhjdf';
            $path = "photo-videos/" . $photo_video;
            move_uploaded_file($temp, $path);
            $update = "update photo_video set photo='$path',type='$type',caption='$caption',description='$description',date='$dt',time='$tym' WHERE id=" . $photoid;
            mysqli_query($conn, $update);
            header("Location:view-photo-video.php");
        } else {
            header("Location:photo-video.php?er=2");

        }
    } else {
        echo 'dfkljdfkgj';
        $update = "update photo_video set type='$type',caption='$caption',description='$description',date='$dt',time='$tym' WHERE id=".$photoid;
        echo $update;
        mysqli_query($conn, $update);
        header("Location:view-photo-video.php");
    }

}

?>

