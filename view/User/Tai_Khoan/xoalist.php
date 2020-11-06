<?php
include('../connect.php');
$xoa=$conn->prepare('delete from youtubelist where id="'.$_GET['id'].'"');
$xoa->execute();
echo '<script>alert("Xóa Playlist thành công");</script>';
include('dsplay.php');
?>