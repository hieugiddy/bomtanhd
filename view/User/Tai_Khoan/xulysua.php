<?php
	include('../connect.php');
	$taikhoan=$conn->prepare('update taikhoan set password="'.$_POST['password'].'" where username="'.$_POST['olduser'].'"');
	$taikhoan->execute();        
	setcookie("matkhau", $_POST['password'],time()+360000,"/","",0);
	header('Location: /');
?>