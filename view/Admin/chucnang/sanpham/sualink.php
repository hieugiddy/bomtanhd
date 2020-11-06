<?php
include('../connect.php');
$sua =$conn->prepare('update linkphim set link="'.$_GET['link'].'" where maSP='.$_GET['maSP'].' and tenhienthi="'.$_GET['tenhienthi'].'" and server="'.$_GET['server'].'" and loai="'.$_GET['loai'].'"');
$sua->execute();
?>