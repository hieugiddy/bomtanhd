<?php 
	$lienquan=$conn->prepare('select chitietsanpham.maSP,tenSP,hinhanh,soluong,username from sanpham,chitietsanpham where chitietsanpham.maSP=sanpham.maSP and sanpham.maSP not in("'.$_GET['id'].'") order by RAND() limit 6');
	$lienquan->execute();
        if($lienquan->rowcount()>0)
	while ($row=$lienquan->fetch(PDO::FETCH_ASSOC)) {
		echo '
<div class="related">
<li>
<div class="related-thumb"><a class="related-img" href="?Layout=baiviet&id='.$row['maSP'].'" style="background:url('.$row['hinhanh'].') no-repeat center center;background-size: cover"></a></div><h3 class="related-title"><a href="?Layout=baiviet&id='.$row['maSP'].'" style="background:#000">'.$row['tenSP'].'</a></h3>
</li>
</div>
		';
	}
        
?>

