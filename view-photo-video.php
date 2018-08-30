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
<?php
$s = "select * from photo_video WHERE email='$email'";
$result = mysqli_query($conn, $s);
if (mysqli_num_rows($result) <= 0) {
    echo 'No Data Found';
} else {
    ?>
    <table class="table table-hover">
        <tr>
            <th>Sr No.</th>
            <th>Type</th>
            <th>Photo/Video</th>
            <th>Caption</th>
            <th>Description</th>
            <th colspan="2">Controls</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo ++$i; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php if ($row['type'] == 'photo') { ?><img src="<?php echo $row['photo'] ?>"
                                                                width="100"><?php } else { ?>
                        <video src="<?php echo $row['photo']; ?>" width="100"></video> <?php } ?></td>
                <td><?php echo urldecode($row['caption']) ?></td>
                <td><?php echo urldecode($row['description']) ?></td>
                <td><a href="update_photo.php?q=<?php echo $row[0] ?>"><span class="glyphicon glyphicon-edit"></span></a> </td>
                <td><a href="delete_photo.php?q=<?php echo $row[0] ?>"><span class="glyphicon glyphicon-remove"></span></a> </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
?>
</div>
<?php
include 'footer.php';
?>
