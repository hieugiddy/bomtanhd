<?php
	include('./chucnang/connect.php');
	$thongtinsp=$conn->prepare('select * from sanpham,chitietsanpham where chitietsanpham.maSP=sanpham.maSP and sanpham.maSP='.$_GET['maSP']);
	$thongtinsp->execute();
	$ttsanpham=$thongtinsp->fetch(PDO::FETCH_ASSOC);

	$theloai=$conn->prepare('select * from theloai');
	$theloai->execute();

	$theloaicon=$conn->prepare('select maTLC,tenTLC from chitiettheloai where maTL='.$ttsanpham['maTL']);
	$theloaicon->execute();
?>
<h4><i class="fa fa-edit mr-2 my-3"></i>Chỉnh sửa thông tin bài viết</h4>
<form action="chucnang/sanpham/xulysua.php" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-9">
			<input type="hidden" name="maSP" value="<?php echo $ttsanpham['maSP'];?>">
			<label>Tên đề:</label>
			 <input type="text" value="<?php echo $ttsanpham['tenSP'];?>" name="tensp" size="60" required/>
			 
			 <label class="ml-3 mr-2">Chuyên mục:</label>
			 <select name="chontl" id="theloai" onchange="load_tlc(this)">
			 	<?php 
			 		while($row=$theloai->fetch(PDO::FETCH_ASSOC)){
		 				if($row['maTL']==$ttsanpham['maTL'])
		 					echo '<option value="'.$row['maTL'].'" selected>'.$row['tenTL'].'</option>';
		 				else
			 				echo '<option value="'.$row['maTL'].'">'.$row['tenTL'].'</option>';
			 		}
			 	?>
			 </select><br>
			 
			 <label>Ảnh hiện tại:</label>
			 <img src="<?php echo $ttsanpham['hinhanh'];?>" width="60px" height="80px" style="object-fit:cover;margin:20px 0 20px 20px"/>
			 <input type="text" name="linkhinh" value="<?php echo $ttsanpham['hinhanh'];?>" size="60"/><br>
			 <label>Đổi ảnh: </label>
			 <input type="file" name="image" accept="image/jpeg,image/png" style="border:none;" />
			 
			 
			 <input type="hidden" value="<?php echo $ttsanpham['soluong'];?>" name="soluong" required/>
                         <br>
			 
                         <label>Mô tả ngắn:</label><br/>
			 <textarea name="motangan" cols="" rows="" style="height:230px;width:100%" required><?php echo $ttsanpham['motangan'];?></textarea><br/><br/>
                         
			 <label>Từ khóa:</label>
			 <input type="text" placeholder="Từ khóa cách nhau bởi dấu phẩy" style="width:100% !important" name="tukhoa" value="<?php echo $ttsanpham['tukhoa'];?>" required/>
			 <br><br>
			 <h5>Nội dung bài viết:</h5>
			 <textarea name="mota" cols="" rows="" required><?php echo $ttsanpham['moTa'];?></textarea>
				
		</div>
		<div class="col-md-3">
			<h4>Chuyên mục con:</h4>
			<p id="chitiettheloai">
				<?php
					while ($row=$theloaicon->fetch(PDO::FETCH_ASSOC)) {
						if($row['maTLC']==$ttsanpham['maTLC'])
							echo '<input type="radio" name="maTLC" value="'.$row['maTLC'].'" checked/>'.$row['tenTLC'].'<br>';
						else
							echo '<input type="radio" name="maTLC" value="'.$row['maTLC'].'"/>'.$row['tenTLC'].'<br>';
					}
				?>
			</p>
			<hr>
                        <?php 
                        if($_COOKIE['quyenhan']==1){
                        ($ttsanpham['hot']==1)?($trangthainb='checked'):($trangthainb='');
                        echo '
			<input type="checkbox" name="noibat" value="1" '.$trangthainb.'/>Hiển thị ở Sản Phẩm Nổi Bật<br>
			<label>- Độ ưu tiên:</label>
			<input type="number" name="uutien" value="'.$ttsanpham['uutien'].'" style="width: 55px" min="0" max="100" required/>
			<br><em>(Độ ưu tiên càng cao thì càng được hiển thị lên đầu tiên)</em>'; }?>
		</div>
	</div>
        <br/>
        <p><span><img src="https://1.bp.blogspot.com/-OdX0s-jjQGs/X0stTyrpVDI/AAAAAAAABJw/45eq0EGxzHgxdw-zQxXDi2B0s938fAVLQCNcBGAsYHQ/s23/full.png"/> Toàn màn hình</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-Q5az4sbJ1Gg/X0suTl9xV6I/AAAAAAAABJ8/0XbotlZ_dc8CIX5ZHhjeB1t-8wvn5Il4ACNcBGAsYHQ/s26/lk.png"/> Chèn link</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-V42l-fRUYPc/X0su_HwlkVI/AAAAAAAABKE/Qx0rd9iMbxcJ33Q2qCUeSahcIZ1iGf2qACNcBGAsYHQ/s38/mauchu.png"/> Màu chữ</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-_S2BDpfZXG0/X0svFTEMaVI/AAAAAAAABKI/82bgeLvD-WIfJ7GY4NSQmEQ2Bpxu1Xc2ACNcBGAsYHQ/s320/phantrang.png"/> Ngắt trang, phân trang</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-sj-0Vyv5qIk/X0svMUSoBvI/AAAAAAAABKM/8sAOtpCOtCcM5sTa3m0MTU7E-aR88-fVACNcBGAsYHQ/s25/saochpdd.png"/> Sao chép định dạng</span>,&nbsp;<span><img src="https://1.bp.blogspot.com/-5F1bpguAA30/X0svSn5Q78I/AAAAAAAABKU/oJ3qwDxuIlwFx_NpJ-k5GLab5-hjIkQZQCNcBGAsYHQ/s24/tad.png"/> Thụt lề</span></p>
	<br><br>
	<input type="submit" value="Sửa bài viết" class="btn btn-success" />
	<a href="?menu=sanpham" class="btn btn-danger">Hủy Sửa</a>
</form>


<script>
  function load_tlc(obj){
    var tl=obj.value;
      $.ajax({
          url : "/Admin/chucnang/sanpham/gettlc.php",
          type : "get",
          dataType:"text",
          data : {
               maTL : tl
          },
          success : function (result){
              $('#chitiettheloai').html(result);
          }
      });
  }

</script>
<script>

        CKEDITOR.replace('mota',{
             filebrowserImageBrowseUrl: '/Admin/chucnang/sanpham/upload/index.php'

        });
</script>