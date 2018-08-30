<?php
error_reporting(0);
session_start();
if (isset($_SESSION['useremail'])) {
    include 'user_header.php';
} else {
    include 'adminheader.php';
}
?>

<div class="container">
    <h1 class="text-center">Upload Photo/Video</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <b>Type</b>
            <input type="radio" name="type" id="type" checked value="photo">Photo
            <input type="radio" name="type" id="type" value="video">Video
        </div>
        <div class="form-group">
            Upload Photo/Video
            <input type="file" class="form-control" name="photo_video" required id="photo_video">
        </div>
        <div class="form-group">
            Caption
            <input type="text" class="form-control" name="caption" required id="caption">
        </div>
        <div class="form-group">
            Description
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="submit">
        </div>

        <div class="text-center">
            <?php
            if (isset($_REQUEST['er'])) {
                $er = $_REQUEST['er'];
                if ($er == 1) {
                    echo '<span class="alert alert-danger">It already Exist</span>';
                } elseif ($er == 2) {
                    echo '<span class="alert alert-danger">Upload an Image Only</span>';
                }elseif ($er == 3) {
                    echo '<span class="alert alert-danger">Upload a Video Only</span>';
                } else {
                    echo '<span class="alert alert-success">Uploaded Successfully</span>';
                }
            }
            ?>
        </div>

    </form>
</div>
<?php
include 'footer.php';
?>
