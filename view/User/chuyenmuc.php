
<style>
.phantrang{
  width:99%;
  margin:20px auto
}
  .phantrang span, .phantrang a{
   padding: 7px 10px;
    border-radius:4px
  }
  .phantrang span{
   background:#eee;
    border:1px solid #999; 
  }
  .phantrang a{
    background:#333;
    border:1px solid #222; 
    color:#fff
  }
  .phantrang a:hover{
     background:#eee;
    color:#000
  }
</style>
<?php
	if(isset($_GET['phimle'])) 
		$c_title='Phim lẻ';
	
	if(isset($_GET['phimbo']))
		$c_title='Phim bộ';
	
	if(isset($_GET['topimdb']))
		$c_title='Top IMDB';

	if(isset($_GET['maTL'])){
		$c_title=hienThiChiTietTheLoai($_GET['maTL'])->getTenTL();
	}
	
	if(isset($_GET['quocgia'])){
		$c_title=hienThiChiTietQuocGia($_GET['quocgia'])->getTen();
	}

	if(isset($_GET['year'])){
		$c_title='Phim của năm '.$_GET['year'];
	}


?>

<div class="group-film group-film-category" id="cat-phim-bo" data-page="1" data-slug="">
<h2><?php echo $c_title; ?></h2>
 <span class="line-ngang"></span>
<div class="group-film-small">
<?php
	if(isset($_GET['phimle']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,"phimle",null,null,null);
		else
			phanTrang(null,1,"phimle",null,null,null);

	if(isset($_GET['phimbo']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,"phimbo",null,null,null);
		else
			phanTrang(null,1,"phimbo",null,null,null);
	
	if(isset($_GET['topimdb']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,"topimdb",null,null,null);
		else
			phanTrang(null,1,"topimdb",null,null,null);

	if(isset($_GET['maTL']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,null,null,$_GET['maTL'],null);
		else
			phanTrang(null,1,null,null,$_GET['maTL'],null);
	
	if(isset($_GET['quocgia']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,null,$_GET['quocgia'],null,null);
		else
			phanTrang(null,1,null,$_GET['quocgia'],null,null);

	if(isset($_GET['year']))
		if(isset($_GET['page']))
			phanTrang($_GET['page'],1,null,null,null,$_GET['year']);
		else
			phanTrang(null,1,null,null,null,$_GET['year']);
?>


</center></div>
</div>


<div class="quangcao">
</div>



			
					


