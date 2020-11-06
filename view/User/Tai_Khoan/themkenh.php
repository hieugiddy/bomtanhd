<?php
include('../connect.php');
$ktr=$conn->prepare('select * from youtubechanel where link="'.$_GET['id'].'"');
$ktr->execute();
if($ktr->rowCount()==0){
$themkenh=$conn->prepare('insert into youtubechanel(link,username) values("'.$_GET['id'].'","'.$_COOKIE['user'].'")');
$themkenh->execute();
echo '<script>alert("Thêm kênh thành công");</script>';
}
else
 echo '<script>alert("Kênh đã tồn tại");</script>';
include('dskenh.php');
?>