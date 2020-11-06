<?php
include('../connect.php');
$ktr=$conn->prepare('select * from youtubelist where link="'.$_GET['id'].'"');
$ktr->execute();
if($ktr->rowCount()==0){
$themlist=$conn->prepare('insert into youtubelist(link,username) values("'.$_GET['id'].'","'.$_COOKIE['user'].'")');
$themlist->execute();
echo '<script>alert("Thêm Playlist thành công");</script>';
}
else
 echo '<script>alert("Playlist đã tồn tại");</script>';
include('dsplay.php');
?>