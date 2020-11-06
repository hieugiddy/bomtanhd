<?php
include('../connect.php');
try{
$them=$conn->prepare('insert into linkphim(maSP,tenhienthi,link,loai,server) values('.$_GET['maSP'].',"'.$_GET['tenhienthi'].'","'.$_GET['link'].'","'.$_GET['loai'].'","'.$_GET['server'].'")');
$them->execute();
}
catch(Exception $e){

}
?>