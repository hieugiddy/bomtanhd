<div id="giohang">
	<h4><i class="fa fa-history"></i>&nbsp;Lịch sử</h4><hr>
	<div id="spgiohang">
	<?php
		if(!isset($_SESSION['sanpham_gh'])){
			echo 'Không có sản phẩm nào';
		}
		else{
			for($i=count($_SESSION['sanpham_gh'])-1;$i>=0;--$i){
				if($_SESSION['sanpham_gh'][$i]!=""){
					echo '<p><a href="?Layout=baiviet&id='.$_SESSION['sanpham_gh'][$i].'"><i class="fa fa-caret-right mr-2"></i><span>'.$_SESSION['tensanpham'][$i].'</span></a>&nbsp;&nbsp;<a href="./Theme/giohang/xoasanpham.php?id='.$_SESSION['sanpham_gh'][$i].'&xoa=" style="color:blue;text-decoration:underline">Xóa</a></p>';
				}
			}
		}
	?>
	</div>
	
	<br>
</div>