<?php
ob_start();
error_reporting(0);
session_start();
if (isset($_SESSION['useremail'])) {
    include 'user_header.php';
} else {
    include 'adminheader.php';
}
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
$s = "select * from photo_video WHERE caption='$caption'";
$result = mysqli_query($conn, $s);

echo $type;

if ($type == 'video') {
    if ($ext != 'mp4') {
        echo 'video';
        header("Location:photo-video.php?er=3");
    } else {
        if (mysqli_num_rows($result) > 0) {
            header("Location:photo-video.php?er=1");
        } else {
            echo 'gjdfjhjdf';
            $path = "photo-videos/" . $photo_video;
            move_uploaded_file($temp, $path);
            $insert = "insert into photo_video VALUES (NULL ,'$path','$type','$caption','$description','$dt','$tym','$email')";
            mysqli_query($conn, $insert);
            header("Location:photo-video.php?er=4");
        }
    }
} elseif ($type == 'photo') {
    echo '------------photowala----------------------' . $ext;
    if ($ext == 'png' || $ext == 'jpg' || $ext == 'gif' || $ext == 'jpeg') {
        if (mysqli_num_rows($result) > 0) {
            header("Location:photo-video.php?er=1");
        } else {
            echo 'gjdfjhjdf';
            $path = "photo-videos/" . $photo_video;
            move_uploaded_file($temp, $path);
            $insert = "insert into photo_video VALUES (NULL ,'$path','$type','$caption','$description','$dt','$tym','$email')";
            mysqli_query($conn, $insert);
            header("Location:photo-video.php?er=4");
        }
    } else {

        echo '------------------uploadphoto';
        header("Location:photo-video.php?er=2");
    }
}

?>

