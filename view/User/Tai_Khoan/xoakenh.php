<?php
include('../connect.php');
$xoa=$conn->prepare('delete from youtubechanel where id="'.$_GET['id'].'"');
$xoa->execute();
echo '<script>alert("Xóa kênh thành công");</script>';
include('dskenh.php');
?>