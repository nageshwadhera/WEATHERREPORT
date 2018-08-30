<?php
error_reporting(0);
session_start();
if (isset($_SESSION['useremail'])) {
    include 'user_header.php';
} else {
    include 'adminheader.php';
}
$id = $_REQUEST['q'];
$s = "select * from photo_video where id=" . $id;
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);
?>

<div class="container">
    <h1 class="text-center">Upload Photo/Video</h1>
    <form action="save_photo.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="photoid" id="photoid" value="<?php echo $id; ?>">
        <div class="form-group">
            <b>Type</b>
            <input type="radio" name="type" id="type" <?php if ($row['type']=='photo') { ?> checked <?php } ?> value="photo">Photo
            <input type="radio" name="type" id="type" <?php if ($row['type']=='video') { ?> checked <?php } ?> value="video">Video
        </div>
        <div class="form-group">
            Upload Photo/Video
            <img src="<?php echo $row['photo'] ?>" width="100">
            <input type="file" class="form-control" name="photo_video" id="photo_video">
        </div>
        <div class="form-group">
            Caption
            <input type="text" class="form-control" value="<?php echo urldecode($row['caption']) ?>" name="caption" required id="caption">
        </div>
        <div class="form-group">
            Description
            <textarea class="form-control" name="description" id="description"><?php echo urldecode($row['description']) ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="submit">
        </div>

        <div class="text-center">
            <?php
            if (isset($_REQUEST['er'])) {
                $er = $_REQUEST['er'];
                if ($er == 2) {
                    echo '<span class="alert alert-danger">Upload an Image Only</span>';
                } elseif ($er == 3) {
                    echo '<span class="alert alert-danger">Upload a Video Only</span>';
                }
            }
            ?>
        </div>

    </form>
</div>
<?php
include 'footer.php';
