<?php
	include('../connect.php');
	$xoa=$conn->prepare('delete from khuyenmai where stt='.$_GET['maKM']);
	$xoa->execute();
	header('Location: /Admin?menu=khuyenmai');
?>