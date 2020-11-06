<?php
include('../connect.php');
//xóa ở trang chi tiết thể loại
$xoacttl=$conn->prepare('delete from linkphim where maSP="'.$_GET['maSP'].'" and tenhienthi="'.$_GET['tenhienthi'].'" and server="'.$_GET['server'].'" and loai="'.$_GET['loai'].'"');
$xoacttl->execute();
echo '
<script>
	location.href="/Admin/chucnang/sanpham/xemlink.php?id='.$_GET['maSP'].'";
</script>';
?>